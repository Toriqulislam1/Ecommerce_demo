<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\category;
use App\Models\subCategory;
use App\Models\brand;
use App\Models\color;
use App\Models\inventory;
use App\Models\product;
use App\Models\ProductThumbnail;
use App\Models\size;
use Carbon\Carbon;

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
}//end

function variationProduct(){

    $sizes = size::all();
    $colors = color::all();

    return view('admin.product.variation',['sizes'=>$sizes,'colors'=>$colors]);
}//end

public function sizeStore(Request $request){

size::insert([

'size_name'=>$request->size_name

]);

return back();

}//end

function colorDelete($id){

    color::find($id)->delete();

    return back();
}

public function colorStore(Request $request){


    color::insert([

        'color_name'=>$request->color_name

        ]);

        return back();

}//end


function sizeDelete($id){

    size::find($id)->delete();

    return back();
}//end

function inventoryAdd($product_id){

    // $id_info = $product_id;

    //   $product_id = product::where('product_id' , $product_id)->get();

     $colors = color::all();
     $sizes = size::all();
     $inventories = Inventory::where('product_id', $product_id)->get();



     return view('admin.product.inventory',[

        'product_id'=>$product_id,
        'colors'=>$colors,
        'sizes'=>$sizes,
        'inventories'=>$inventories,
    ]);

}//end

function inventoryStore(Request $request){




    if(Inventory::where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){
        Inventory::where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);
        return back();
    }
    else{
        Inventory::insert([
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return back();

}


}//end


 function productDetails($product_id){

    $id = $product_id;

    $product_thumbnails = ProductThumbnail::where('product_id',$id)->get();
    $colors = Inventory::where('product_id', $id)->groupBy('color_id')->selectRaw('sum(color_id) as sum,color_id')->get();
    $sizes = Inventory::where('product_id', $id)->groupBy('size_id')->selectRaw('sum(size_id) as sum,size_id')->get();






    $product_details = product::find($product_id);

    return view('frontend.product.details',[
        'product_details'=>$product_details,
        'product_thumbnails'=>$product_thumbnails,
        'colors'=>$colors,
        'sizes'=>$sizes,

    ]);

 }//end

 function couponIndex(){


    return view('admin.product.coupon');

 }//end







 }
