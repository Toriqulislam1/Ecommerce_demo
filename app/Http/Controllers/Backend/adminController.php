<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class adminController extends Controller
{
    public Function login(){

        return view('admin.login');
    }//end

    public function loginCheck (Request $request){
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){

            return view('admin.index');
        }else{

            return view('admin.login');
        }
    }//end

    public function adminLogout(Request $request){


            Auth::guard('admin')->logout();
            return redirect()->route('loginFrom');


    }



}
