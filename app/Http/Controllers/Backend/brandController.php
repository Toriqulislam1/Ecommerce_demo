<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;
use Image;

class brandController extends Controller
{
    public function create(){
        $brands =brand::all();
        return view('admin.brand.create',['brands'=>$brands]);
    }//end

    public function brandAdd(Request $request){


        $image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/brand/'.$name_gen);
    	$save_url = 'upload/brand/'.$name_gen;

        brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_img'=>$save_url

        ]);

       return redirect()->back();

    }//end

    public function brandEdit($id){

        $brands = brand::find($id);



        return view('admin.brand.edit',['brands'=>$brands]);
    }//end

    public function brandUpdate(Request $request){

        $id = $request->id;
        $old_img = $request->old_image;
        // unlink( $old_img);



        if(isset($request->brand_image)){

            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            brand::find($id)->update([
                'brand_name'=>$request->brand_name,
                'brand_img'=>$save_url,
            ]);
        }else{

            brand::find($id)->update([
                'brand_name'=>$request->brand_name,
            ]);
        }

    }//end





}
