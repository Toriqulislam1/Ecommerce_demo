<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customarlogin;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class authController extends Controller
{
    public function register(){
        return view('frontend.customer.register');
    }//end

    public function login(){
        return view('frontend.customer.login');
    }//end

    public function registerStore(Request $request){


        customarlogin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->mobile,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),

        ]);

        return back();

    }//end


    public function loginCheck(Request $request){



        if(Auth::guard('customerlogin')->attempt(['email'=>$request->email, 'password'=>$request->password])){

            return view('frontend.customer.profile');
        }else{

            return view('frontend.customer.register');
        }





    }//end

    function customerLogout(){
        
        Session::flush();

        Auth::guard('customerlogin')->logout();
    
        return redirect()->route('customer-login-index');

    }//end


}
