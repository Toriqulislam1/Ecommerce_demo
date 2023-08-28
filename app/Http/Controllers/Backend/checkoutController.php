<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\order;
use App\Models\cart;
use App\Models\Inventory;
use App\Models\billing_address;
use App\Models\shipping_details;
use Carbon\Carbon;
use auth;

class checkoutController extends Controller
{



    function checkoutStore(Request $request){


        if($request->payment_method == 1){
        //Orders
         $order_id = '#'.Str::upper(Str::random(3)).'-'.rand(99999999, 10000000);

         $carts = Cart::where('user_id',auth()->guard('customerlogin')->user()->id)->get();
         foreach($carts as $cart){
        Order::insert([
            'order_id'=>$order_id,
            'coustomer_id'=>auth()->guard('customerlogin')->user()->id,
            'product_id'=>$cart->product_id,
            'total'=>$request->total,
            'discount'=>0,
            'delivery_charge'=>100,
            'payment_method'=>$request->payment_method,
            'created_at'=>Carbon::now(),
        ]);



        Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);
    }

        //billing
        billing_address::insert([
            'order_id'=>$order_id,
            'coustomer_id'=>auth()->guard('customerlogin')->user()->id,
            'name'=>$request->billing_name,

            'email'=>$request->billing_email,
            'phone'=>$request->billing_mobile,
            'address'=>$request->billing_address,
            'country'=>$request->billing_country,
            'city'=>$request->billing_city,
            'state'=>$request->billing_state,
            'zip_code'=>$request->billing_code,
            'created_at'=>Carbon::now(),
        ]);

//shipping
        shipping_details::insert([
            'order_id'=>$order_id,
            'coustomer_id'=>auth()->guard('customerlogin')->user()->id,
            'name'=>$request->shipping_name,

            'email'=>$request->shipping_email,
            'phone'=>$request->shipping_mobile,
            'address'=>$request->shipping_address,
            'country'=>$request->shipping_country,
            'city'=>$request->shipping_city,
            'state'=>$request->shipping_state,
            'zip_code'=>$request->shipping_zip,
            'created_at'=>Carbon::now(),
        ]);


        Cart::where('user_id', auth()->guard('customerlogin')->user()->id)->delete();

        //  return redirect()->route('order.success')->withOrder($order_id);

        return "order success";

        }


        // function orderSuccess(){


        //     return "ok";
        //     if(session('order')){
        //         $order_id = session('order');
        //         return view('frontend.customer.ordersuccess', [
        //             'order_id'=>$order_id,
        //         ]);
        //     }
        //     else{
        //         abort('404');
        //     }

        // }



        //clear  cart after order
        // Cart::where('customer_id', Auth::guard('customerlogin')->id())->delete();
    //     $abc = substr($order_id, 1,13);
    //     return redirect()->route('order.success', $abc)->with('success', 'ada');
    //     }

    //     else if($request->payment_method == 2){
    //         $data = $request->all();
    //         return redirect()->route('pay')->with('data', $data);
    //     }
    //     else{
    //         $data = $request->all();
    //         return view('frontend.stripe', [
    //             'data'=>$data,
    //         ]);
    //     }

     }




}
