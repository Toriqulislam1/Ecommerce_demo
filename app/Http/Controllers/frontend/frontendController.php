<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class frontendController extends Controller
{

    function index(){

$products = product::all();

    return view('frontend.index',[
        'products'=>$products,
    ]);
    }//end


}
