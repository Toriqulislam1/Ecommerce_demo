<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\color;
use App\Models\product;
use App\Models\size;
use Illuminate\Http\Request;

class searchController extends Controller
{
    function search(Request $request){

        $data = $request->all();

        $colors = color::all();
        $sizes = size::all();

        $products = product::where(function($q) use($data){

            if(!empty($data['q'])&& $data['q']!='' && $data['q']!='undefined'){
                $q->where(function($q) use($data){
                    $q->where('product_name','like', '%'. $data['q'].'%');
                    $q->OrWhere('short_description','like', '%'. $data['q'].'%');
                    $q->OrWhere('long_description','like', '%'. $data['q'].'%');
                });
            }


        })->get();

        return view('frontend.search',[
            'products'=>$products,
            'colors'=>$colors,
            'sizes'=>$sizes,
        ]);
    }
}
