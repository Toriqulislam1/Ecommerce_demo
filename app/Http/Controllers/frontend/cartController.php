<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customarlogin;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\cart;

class cartController extends Controller
{
    function cartStore(Request $request){

        cart::insert([

            'user_id'=>auth()->guard('customerlogin')->user()->id,
            'product_id'=>$request->product_id,
            'color_id'=>$request->color_id,
            'size_id'=>$request->size_id,
            'quantity'=>$request->quantity,
        ]);

        return back();

    }//end

    public function cartview(){

        return view('frontend.customer.cartview');

    }//end
}
