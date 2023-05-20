<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function listMenu(Request $request){
        $menu = MenuModel::orderBy('id_menu','desc')->get();
        return view('admin.layouts.main_menu.list',compact('menu'));
    }

    public function addMenu(Request $request){

    }
}
