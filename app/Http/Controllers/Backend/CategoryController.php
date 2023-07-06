<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\category;
use App\Models\subCategory;


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

    //sub category

    public function subCreate(){


        $categories= category::all();
        $subCategories= subCategory::all();
        return view('admin.category.sub.index',[

            'categories'=>$categories,
            'subCategories'=>$subCategories,
    ]);

    }//end


    public function subStore(Request $request){



        subCategory::insert([
            'category_id'=>$request->category_id,
            'subCategory_name'=>$request->subcategory_name,
        ]);

       return redirect()->back();


    }//end

    public function subCategoryEdit($id){

        $info = subCategory::find($id);
        $categories= category::all();
        return view('admin.category.sub.edit',[
            'info'=>$info,
            'categories'=>$categories,
        ]);
    }//end

    public function subcategoryUpdate(Request $request){



    subCategory::find($request->id)->update([

        'category_id'=>$request->category_id,
        'subCategory_name'=>$request->subcategory_name,

    ]);

    return redirect()->back();

    }//end

}
