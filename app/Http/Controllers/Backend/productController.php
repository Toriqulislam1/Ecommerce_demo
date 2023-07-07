<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\category;
use App\Models\subCategory;
use App\Models\brand;

class productController extends Controller
{
    public function create(){

        $categories= category::all();
        $brands =brand::all();
        $subcategories = subCategory::all();

        return view('admin.product.add_product',[
            'categories'=>$categories,
            'brands'=>$brands,
            'subcategories'=>$subcategories,
        ]);
    }//end


   
}
