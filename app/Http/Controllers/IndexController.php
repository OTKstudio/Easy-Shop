<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class IndexController extends Controller
{
    public function index(){
        return view('frontend.index'); 
    }
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
