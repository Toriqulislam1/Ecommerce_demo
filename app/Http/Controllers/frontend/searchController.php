<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class searchController extends Controller
{
    function search(Request $request){

        $data = $request->all();

        $products = product::where(function($q) use($data){

            if(!empty($data['q'])&& $data['q']!='' && $data['q']!='undefined'){
                $q->where(function($q) use($data){
                    $q->where('product_name','like', '%'. $data['q'].'%');
                });
            }


        })->get();

        return view('frontend.search',['products'=>$products]);
    }
}
