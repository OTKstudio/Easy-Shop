<?php

namespace App\Http\Controllers;
use App\Models\Brand;

use Illuminate\Http\Request;

use Intervention\Image\Image;

class BrandController extends Controller
{
   public function BrandView(){
       $brands = Brand::latest()->get();
       return view('admin.brand.brand_view',compact('brands'));
    // return view('index');
   }

   public function BrandStore(Request $request){
     $request->validate([
      'brand_name_en'=>'required',
      'brand_name_hin'=>'required',
      'brand_image'=>'required',
     ],[
        'brand_name_en'=>'input Brand English Name',
        'brand_name_hin'=>'input Brand Hindi Name',
        'brand_image'=>'insert image',
     ]);
     $file = $request->file('brand_image');
     $filename = date('ymdhi').$file->getClientOriginalName();
     $file->move(public_path('upload/brand'),$filename);

     Brand::insert([
        'brand_name_en'=>$request->brand_name_en,
        'brand_name_hin'=>$request->brand_name_hin,
        'brand_slug_en'=>strtolower(str_replace('','-',$request->brand_name_en)),
        'brand_slug_hin'=>strtolower(str_replace('','-',$request->brand_name_hin)),
        'brand_image'=>$filename,
     ]);
     $notification = array(
      'message' =>'Brand Inserted',
      'alert-type'=>'success'
     );
     return redirect()->back()->with($notification);
   }

   public function BrandEdit($id){
       $brand = Brand::findOrFail($id);
       return view('admin.brand.brand_edit',compact('brand'));
   }

   public function BrandUpdate(Request $request){
       $brand_id = $request->id;
       $old_img = $request->old_image;
       @unlink('upload/brand/'.$old_img);
       $file = $request->file('brand_image');
       $filename = date('ymdhi').$file->getClientOriginalName();
       $file->move(public_path('upload/brand'),$filename);
       Brand::findOrFail($brand_id)->update([
           'brand_name_en'=> $request->brand_name_en,
           'brand_slug_en'=> strtolower(str_replace('','-',$request->brand_name_en)),
           'brand_slug_hin'=> strtolower(str_replace('','-',$request->brand_name_hin)),
           'brand_name_hin'=> $request->brand_name_hin,
           'brand_image'=> $filename,
       ]);

       $notification = array(
        'message' =>'Brand Updated',
        'alert-type'=>'success'
       );
       return redirect()->route('all.brand')->with($notification);
   }

   public function BrandDelete($id){

    $brand = Brand::findOrFail($id);
    $image = $brand->brand_image;
    @unlink('upload/brand/'.$image);
    Brand::findOrFail($id)->delete();

    $notification = array(
        'message' =>'Brand DELETED',
        'alert-type'=>'success'
       );
       return redirect()->route('all.brand')->with($notification);
  }
}
