<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class brandController extends Controller
{
    public function create(){
        return view('admin.brand.create');
    }//end

    public function brandAdd(Request $request){

        return $request->all();
    }
}
