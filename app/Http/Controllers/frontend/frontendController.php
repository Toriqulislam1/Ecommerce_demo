<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\brand;


class frontendController extends Controller
{

    function index(){

        $brands = brand::all();

$products = product::all();

    return view('frontend.index',[

        'products'=>$products,
        'brands'=>$brands,
    ]);
    }//end


 function customerOrderShow(){

    // $orders =

    return view('frontend.customer.order');
 }


}
