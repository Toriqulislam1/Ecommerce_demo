<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\category;


class CategoryController extends Controller
{
    public function create(){

        $categories = category::all();
        return view('admin.category.addcategory',['categories'=>$categories]);
    }//end

    public function store(Request $request){

        $image = $request->file('category_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/category/'.$name_gen);
    	$save_url = 'upload/category/'.$name_gen;

        category::insert([
            'category_name'=>$request->category_name,
            'category_img'=>$save_url

        ]);

       return redirect()->back();
    }//end

    public function categoryEdit($id){

        $category = category::find($id);
    return view('admin.category.edit',['category'=>$category]);
    }//end

    public function categoryUpdate(Request $request){

        $id = $request->id;
        $oldImage =$request->old_category_image;

         unlink($oldImage);

        $image = $request->file('category_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/category/'.$name_gen);
    	$save_url = 'upload/category/'.$name_gen;

        category::find($id)->update([
            'category_name'=>$request->category_name,
            'category_img'=>$save_url

        ]);

        return redirect()->route('category-view');
    }//end

    public function categoryDelete($id){
        $image = category::find($id);

        unlink($image->category_img);

        $image->delete();
        return redirect()->back();
    }//end
    








}
