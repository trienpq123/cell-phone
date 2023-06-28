<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\CategoryProductModel;
use App\Models\FilterCategory;
use App\Models\MenuModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class IndexController extends Controller
{
    public function index(Request $request){
        $menu = MenuModel::whereNull('parent_menu')->with('chirendMenu','category')->get();

        // dd($menu);
        return view('user.page.main',compact('menu'));
    }

    public function category(Request $request,$slug){

        $getCategory = CategoryModel::where('slug','=',$slug)->first();
        $filter = FilterCategory::where('id_category','=',$getCategory->id_category)->with('filter','filter.childrentFilter')->get();
        $product = CategoryProductModel::where('id_category','=',$getCategory->id_category)->with('products','productDetail')->get();
        return view('user.page.product_all',compact('getCategory','filter','product'));
    }

    public function getProduct(Request $request,$slug){
        $product = ProductModel::where('slug','=',$slug)->first();
        return view('user.page.detail');
    }

    public function getCart(Request $request){
        return view('user.page.cart');
    }

    public function checkLanguage(Request $request,$language){
            $lang = config('app.locale');
            if($language == 'en')
                $lang = 'en';
            if($language == 'vi')
                $lang = 'vi';
            Session::put('language',$lang);
            return back();
    }

}
