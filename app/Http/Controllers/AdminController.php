<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class AdminController extends Controller
{
    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = Carbon::now();
        DB::table('admins')->insert($data);
    
        return redirect()->route('admin.login')->with('success','admin inserted Successfull');
    
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:1|max:15'
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Error');
        }
    
    }
    
    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    function profile(){
        $admindata = Admin::find(3);
        return view('admin.admin_profile', compact('admindata'));
    }

    function editprofile(){
        $editdata = Admin::find(3);
        return view('admin.admin_profile_edit', compact('editdata'));
    }

    function storeprofile(Request $request){

        $data = Admin::find(3);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profil_photo_path));
            $filename = date('ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $notification = array(
            'success' => 'admin profile updated successfully',
        ); 
        $data->save();

     return redirect()->route('admin.profile')->with($notification);    
    }
}
