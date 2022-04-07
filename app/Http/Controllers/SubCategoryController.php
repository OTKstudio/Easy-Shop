<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categorys = Category::orderBy('category_name_en','ASC')->get();
        $subcategorys = SubCategory::latest()->get();
        return view('admin.subcategory.subcategory_view',compact('subcategorys','categorys'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
         'category_id'=>'required',
         'subcategory_name_en'=>'required',
         'subcategory_name_hin'=>'required',
        ],[
           'category_id.required'=>'select category',
           'subcategory_name_en.required'=>'input subcategory English Name',
           'subcategory_name_hin.required'=>'input subcategory Hindi Name',
        ]);

        SubCategory::insert([
           'category_id'=>$request->category_id,
           'subcategory_name_en'=>$request->subcategory_name_en,
           'subcategory_name_hin'=>$request->subcategory_name_hin,
           'subcategory_slug_en'=>strtolower(str_replace('','-',$request->subcategory_name_en)),
           'subcategory_slug_hin'=>strtolower(str_replace('','-',$request->subcategory_name_hin)),
        ]);
        $notification = array(
         'message' =>'subcategory Inserted',
         'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
      }

    public function SubCategoryEdit($id){
        $subcategory = SubCategory::findOrFail($id);
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.subcategory.subcategory_edit',compact('subcategory', 'category'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id'=>$request->category_id,
            'subcategory_name_en'=> $request->subcategory_name_en,
            'subcategory_slug_en'=> strtolower(str_replace('','-',$request->subcategory_name_en)),
            'subcategory_slug_hin'=> strtolower(str_replace('','-',$request->subcategory_name_hin)),
            'subcategory_name_hin'=> $request->subcategory_name_hin,
        ]);
 
        $notification = array(
         'message' =>'subcategory Updated',
         'alert-type'=>'success'
        );
        return redirect()->route('all.SubCategory')->with($notification);
    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' =>'subcategory Deleted',
            'alert-type'=>'info'
           );
           return redirect()->route('all.SubCategory')->with($notification);
      }

    //   //////////// SUB SUB CATEGORY ////////////////////////

    public function SubSubCategoryView(){
        $categorys = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategorys = SubSubCategory::latest()->get();
        return view('admin.subcategory.subsubcategory_view',compact('subsubcategorys','categorys'));
    }

    public function GetSubCategoryView($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subcat);

    }
}
