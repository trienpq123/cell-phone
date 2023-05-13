<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct(Request $request){
        return view('admin.layouts.products.list');
    }

    public function apiListProduct(Request $request){
      
    }

    public function addProduct(Request $request){

    }

    public function editProduct(Request $request){
     
    }

    public function postAddProduct(Request $request){
     
    }

    public function putEditProduct(Request $request){
        

    }
}
