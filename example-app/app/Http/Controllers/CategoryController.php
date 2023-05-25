<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\FilterCategory;
use App\Models\FilterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Termwind\Components\Raw;

class CategoryController extends Controller
{
    public function listCategory(Request $request){
        $listFilter = FilterModel::whereNull('_parent')->get();
        $listCategory = CategoryModel::all();
        return view('admin.layouts.categories.list',compact('listFilter','listCategory'));
    }

    public function apiListCategory(Request $request){
        $listCategory = CategoryModel::orderBy('id_category','desc')->get();
        return response()->json([
            'status' => 200,
            'data' => $listCategory
        ]);
    }

    public function addCategory(Request $request){

    }

    public function editCategory(Request $request){
      $cate =  CategoryModel::find($request->id);
      $getFilter = $cate->getFilter()->get();
        return response()->json([
            "status" => 200,
            "data" => $cate,
            "listFilter" => $getFilter
        ]);
    }

    public function postAddCategory(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'slug' => 'required',
        ]
        );
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'message' => $validator->messages()
            ]);
        };
        $category = new CategoryModel();
        $category->name_category = $request->name;
        $category->slug = $request->slug;
        $category->desc_category = $request->desc;
        if($request->parent_category){
            $category->parent_category = $request->parent_category;
        };
        if($request->image != "undefined"){
            $imageName = $request->image;
            $name_image = time().'_'.$imageName->getClientOriginalName();
            $explode = explode('.',$name_image);
            $typeImage = end($explode);
            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
            if(in_array($typeImage,$imageExtensions)){
                $path = 'public/uploads/images/';
                $imageName->move($path,$name_image);
                $link_url = env('APP_URL').'/'.$path.$name_image;
                $category->image_category = $link_url;
                $category->name_image = $name_image;
            }else{
                return response()->json(
                 [
                    'status' => 404,
                    'message' => ["image" =>  "Tệp phải là hình ảnh"]
                 ]
                );
            }
        }
        $category->hide = $request->status;
        $category->save();
        $lastCategory = CategoryModel::orderBy('id_category','desc')->first();

        if($request->idFilter){
            $filter = explode(',',$request->idFilter);
            $filterOfCategory = new FilterCategory();
            foreach($filter as $f){
                if($f != ''){

                    $filterOfCategory->id_filter = $f;
                    $filterOfCategory->id_category = $lastCategory->id_category;
                    $filterOfCategory->save();
                }
            }
            return response()->json([
                "data" => $filter
            ]);
        }
        return response()->json([
            "status" => 200,
            "data" => $request->all(),
        ]);
    }

    public function putEditCategory(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|max:255',
            'slug' => 'required',
        ]
        );
        if($validator->fails()){
            return response()->json([
                'status' => 404,
                'message' => $validator->messages()
            ]);
        };
        $category =  CategoryModel::where('id_category','=',$request->id)->first();
        $category->name_category = $request->name;
        $category->slug = $request->slug;
        $category->desc_category = $request->desc;
        if($request->parent_category){
            $category->parent_category = $request->parent_category;
        };
        if($request->image != "undefined"){
            $imageName = $request->image;
            $name_image = time().'_'.$imageName->getClientOriginalName();
            $explode = explode('.',$name_image);
            $typeImage = end($explode);
            $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd'];
            if(in_array($typeImage,$imageExtensions)){
                $path = 'public/uploads/images/';
                $imageName->move($path,$name_image);
                $link_url = env('APP_URL').'/'.$path.$name_image;
                $category->image_category = $link_url;
                $category->name_image = $name_image;
            }else{
                return response()->json(
                 [
                    'status' => 404,
                    'message' => ["image" =>  "Tệp phải là hình ảnh"]
                 ]
                );
            }
        }
        $category->hide = $request->status;
        $category->save();
        if($request->idFilter){
            $filter = explode(',',$request->idFilter);
            $filderModel  = FilterModel::find($filter);
            $category->filters()->sync($filderModel);
        }
        return response()->json([
            "status" => 200,
            "data" => $request->all()
        ]);
    }

    public function deleteCategory(Request $request){
        if($request->data){
            foreach($request->data as $item) {
                CategoryModel::where('id_category','=',$item)->delete();
                $getFilterCate = FilterCategory::where('id_category','=',$item);
                if(count($getFilterCate->get()) > 0){
                    $getFilterCate->delete();
                }
            }
        }
            return response()->json([
                "status" => 200,
                "message" => "Xoá thành công",
                'id' => $request->id
            ]);

    }

    public function getChildCategory(Request $request){
        if($request->id){
            $childCategory = CategoryModel::where('parent_category','=',$request->id)->get();
            $filter = FilterCategory::where('id_category','=',$request->id)->with('childFilter','category','filter')->get();
            return response()->json([
                'status' => 200,
                'data' => $childCategory,
                'filter' => $filter
            ]);
        }
    }
}
