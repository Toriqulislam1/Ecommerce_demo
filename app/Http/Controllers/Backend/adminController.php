<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class adminController extends Controller
{
    public Function login(){

        return view('admin.admin_master');
    }
}
