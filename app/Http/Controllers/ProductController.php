<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function addProduct(){
        return view('layouts.layouts_admin.produits.addProduct');
    }





       //
       public function allProduct(){
        return view('layouts.layouts_admin.produits.allProduct');
    }
}
