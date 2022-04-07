<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categorys = Category::latest()->get();
        return view('admin.category.category_view',compact('categorys'));
     // return view('index');
    }

    public function categoryStore(Request $request){
        $request->validate([
         'category_name_en'=>'required',
         'category_name_hin'=>'required',
         'category_icon'=>'required',
        ],[
           'category_name_en.required'=>'input category English Name',
           'category_name_hin.required'=>'input category Hindi Name',
           'category_icon.required'=>'input icon',
        ]);

        Category::insert([
           'category_name_en'=>$request->category_name_en,
           'category_name_hin'=>$request->category_name_hin,
           'category_slug_en'=>strtolower(str_replace('','-',$request->category_name_en)),
           'category_slug_hin'=>strtolower(str_replace('','-',$request->category_name_hin)),
           'category_icon'=>$request->category_icon,
        ]);
        $notification = array(
         'message' =>'category Inserted',
         'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
      }

      public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en'=> $request->category_name_en,
            'category_slug_en'=> strtolower(str_replace('','-',$request->category_name_en)),
            'category_slug_hin'=> strtolower(str_replace('','-',$request->category_name_hin)),
            'category_name_hin'=> $request->category_name_hin,
            'category_icon'=> $request->category_icon,
        ]);
 
        $notification = array(
         'message' =>'category Updated',
         'alert-type'=>'success'
        );
        return redirect()->route('all.Category')->with($notification);
    }

    public function categoryDelete($id){

        Category::findOrFail($id)->delete();
        $notification = array(
            'message' =>'category Deleted',
            'alert-type'=>'info'
           );
           return redirect()->route('all.Category')->with($notification);
      }
}
