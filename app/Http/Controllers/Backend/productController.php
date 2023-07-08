<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\category;
use App\Models\subCategory;
use App\Models\brand;
use App\Models\product;
use App\Models\ProductThumbnail;

class productController extends Controller
{
    public function create(){

        $categories= category::all();
        $brands =brand::all();
        $subcategories = subCategory::all();

        return view('admin.product.add_product',[
            'categories'=>$categories,
            'brands'=>$brands,
            'subcategories'=>$subcategories,
        ]);
    }//end

public function store(Request $request){


    $image = $request->file('product_thambnail');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->save('upload/product/'.$name_gen);
    $save_url_mainImage = 'upload/product/'.$name_gen;

    $after_discount = $request->product_price - $request->product_price*$request->product_discount/100;


   $product_id = product::insertGetId([
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
        'product_name'=>$request->product_name,
        'product_price'=>$request->product_price,
        'product_discount'=>$request->product_discount,

        'after_discount'=>$after_discount,

        'brand_id'=>$request->brand_id,
        'short_description'=>$request->short_descp,
        'long_description'=>$request->long_description,
        'preview'=>$save_url_mainImage,


    ]);


    $loop = 1;

    foreach($request->file('multi_img') as $thumbnail){
        $name_gen = hexdec(uniqid()).'.'.$thumbnail->getClientOriginalExtension();
         Image::make($thumbnail)->save('upload/product/thumbnail/'.$name_gen);
         $save_url_mainImage = 'upload/product/thumbnail/'.$name_gen;


         ProductThumbnail::insert([
            'product_id'=>$product_id,
            'product_thumbnails'=>$save_url_mainImage,



        ]);


        $loop++;

    }


    return redirect()->back();

}//end



public function manageProduct(Request $request){

    $products = product::all();
    return view('admin.product.manage',['products'=>$products]);
}





}
