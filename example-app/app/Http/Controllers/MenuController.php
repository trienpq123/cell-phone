<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\MenuModel;
use App\Models\PagesModel;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function listMenu(Request $request){
        $menu = MenuModel::whereNull('parent_menu')->with('chirendMenu')->get();
        // dd($menu);
        return view('admin.layouts.main_menu.list',compact('menu'));
    }

    public function addMenu(Request $request){
        $menu = MenuModel::whereNull('parent_menu')->with('chirendMenu')->get();
        $category = CategoryModel::whereNull('parent_category')->with('childrendCategory')->get();
        return view('admin.layouts.main_menu.add',compact('category','menu'));
    }
    public function postAddMenu(Request $request){
        $menu = new MenuModel();
        $menu->name_menu = $request->name;
        $menu->slug = $request->slug;
        $menu->link_url = $request->url;
        $menu->position = $request->position;
        $menu->status = $request->status;
        $menu->parent_menu = $request->parent_menu;
        if($request->typeMenu == 1){
            $menu->type = "pages";
        }
        else if($request->typeMenu == 2){
            $menu->type = "category";
        }
        else{
            $menu->type = "custom";
        }
        $menu->save();
        return back();

    }

    public function typeMenu(Request $request){
        $option = '';
        if($request->typeMenu) {
            if($request->typeMenu == 1){
                $page =  PagesModel::orderBy('id_page','desc')->get();
                foreach ($page as $p) {
                    $option .= '<option value ="'.$p->slug.'" data-name="pages" data-slug ="'.$p->slug.'">'.$p->name_page.'</option>';
                }
            }
            if($request->typeMenu == 2){
                $page =  CategoryModel::whereNull('parent_category')->with('childrendCategory')->orderBy('id_category','desc')->get();
                $step = '-----';
                foreach ($page as $p) {
                    $option .= '<option value ="'.$p->slug.'" data-name="pages" data-slug ="'.$p->slug.'">'.$p->name_category.'</option>';
                    if(count($p->childrendCategory) > 0){
                        foreach($p->childrendCategory as $childC){
                            $option .= '<option value ="'.$childC->slug.'" data-name="pages" data-slug ="'.$childC->slug.'">'.$step.$childC->name_category.'</option>';
                        }
                    }
                }

            }

            if($request->typeMenu == 3){

            }
        }

        return $option;
    }

    public function putEditMenu(Request $request){
        $decode_data  = $request->data;

        foreach($decode_data as $data){
                $menu = MenuModel::where('id_menu','=',$data['id_menu'])->first();
                $menu->position = $data['position'];
                if(empty($menu->parent_category)){
                    $menu->parent_menu = null;
                }
                $menu->save();

                if(!empty($data['children']) && count($data['children']) > 0 ){
                    foreach($data['children'] as $child){
                        // dd($child);
                        $menu = MenuModel::where('id_menu','=',$child['id_menu'])->first();
                        $menu->parent_menu = $data['id_menu'];
                        $menu->position = $child['position'];
                        $menu->save();
                    }
                }

        }
        return response()->json([
            'status' => 200,
            'message' => $request->all()
        ]);
    }

    public function apiPutEditMenu(Request $request){
        $menu =  MenuModel::find($request->id);
        $menu->name_menu = $request->name;
        $menu->slug = $request->slug;
        $menu->link_url = $request->url;
        $menu->position = $request->position;
        $menu->status = $request->status;
        $menu->parent_menu = $request->parent_menu;
        if($request->typeMenu == 1){
            $menu->type = "pages";
        }
        else if($request->typeMenu == 2){
            $menu->type = "category";
        }
        else{
            $menu->type = "custom";
        }
        $menu->save();
        return response()->json(
            [
                'status' => 200,
                'data' => $request->all()
            ]
            );
    }

    public function editEditMenu(Request $request){
        if($request->id){
            $menu = MenuModel::find($request->id);
            // $category = CategoryModel::where('slug','=',$menu->slug)->first();
            return response()->json([
                'status' => 200,
                'data' => $menu
            ]);
        }
    }
}
