<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\brand;
use Illuminate\Http\Request;
use Image;

class brandController extends Controller
{
    public function create(){
        return view('admin.brand.create');
    }//end

    public function brandAdd(Request $request){


        $image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/brand/'.$name_gen);
    	$save_url = 'upload/brand/'.$name_gen;

        brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_img'=>$save_url

        ]);

    }
}
