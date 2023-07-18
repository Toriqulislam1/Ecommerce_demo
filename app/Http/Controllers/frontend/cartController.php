<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customarlogin;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\cart;
use App\Models\Coupon;
use Carbon\Carbon;


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

    public function cartview(Request $request){


        $message = null;
        $type = null;

        $coupon = $request->coupon;

        if($coupon == ''){
            $discount = 0;
        }
        else{
            if(Coupon::where('coupon_code', $coupon)->exists()){
               if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_code', $coupon)->first()->validity){
                $message = 'Coupon Code Expired';
                $discount = 0;
               }
               else{
                $discount = Coupon::where('coupon_code', $coupon)->first()->amount;
                $type = Coupon::where('coupon_code', $coupon)->first()->type;
               }
            }
            else{
                $message = 'Invalid Coupon Code';
                $discount = 0;
            }

        }
    






        $carts = cart::where('user_id',auth()->guard('customerlogin')->user()->id)->get();

        return view('frontend.customer.cartview',[
            'carts'=>$carts,
            'coupon'=>$coupon,
            'message'=>$message,
            'discount'=>$discount,
            'type'=>$type,



        ]);

    }//end



    function cartDelete($cartId){

        cart::find($cartId)->delete();
        return back();
    }//end




}
