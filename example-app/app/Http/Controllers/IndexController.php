<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(Request $request){
        $menu = MenuModel::with('chirendMenu')->get();
        return view('user.page.main',compact('menu'));
    }       

    public function category(Request $request){
        return view('user.page.product_all');
    }

    public function getProduct(Request $request){
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
