<?php

namespace App\Http\Controllers;

use App\Models\AttributeModel;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller{

    public function listAttr(Request $request){
        $listAttr = AttributeModel::with('category')->orderBy('id_attr','desc')->get();
        // dd($listAttr);
        return view('admin.layouts.attr.list',compact('listAttr'));
    }

    public function apiListAttr(Request $request){
        $listAttr = AttributeModel::with('category')->orderBy('id_attr','desc')->get();
        return response()->json([
           'data' => $listAttr
        ]);
    }

    public function addAttr(Request $request){
        $listAttr = AttributeModel::with('category')->orderBy('id_attr','desc')->get();
        $listCategory = CategoryModel::whereNull('parent_category')->get();

        return view('admin.layouts.attr.add',compact('listAttr','listCategory'));
    }

    public function editAttr(Request $request){
        $listAttr = AttributeModel::find($request->id)->with('category')->orderBy('id_attr','desc')->first();
        $listCategory = CategoryModel::whereNull('parent_category')->get();
        return view('admin.layouts.attr.edit',compact('listAttr','listCategory'));
    }

    public function postAddAttr(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:50'
        ],
        [
            'name.required' => 'Tên thuộc tính không được bỏ trống',
            'name.max' => 'Tên thuộc tính không được vượt quá 50 ký tự'
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $attr = new AttributeModel();
        $attr->name_attr = $request->name;
        $attr->status = $request->status;
        if($request->parent_category){
            $attr->id_category = $request->parent_category;
        }
        $attr->save();
        return redirect(route('admin.attr.listAttr'))->with(['message' => 'Thêm thành công']);
    }

    public function putEditAttr(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required|max:50'
        ],
        [
            'name.required' => 'Tên thuộc tính không được bỏ trống',
            'name.max' => 'Tên thuộc tính không được vượt quá 50 ký tự'
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }
        $attr = AttributeModel::find($request->id);
        $attr->name_attr = $request->name;
        $attr->status = $request->status;
        if($request->parent_category){
            $attr->id_category = $request->parent_category;
        }
        $attr->save();
        return redirect(route('admin.attr.listAttr'))->with(['message' => 'Cập nhật thành công']);
    }

    public function deleteAttr(Request $request){
        if($request->id){
            $c_attr = AttributeModel::find($request->id);
            if($c_attr){
                $c_attr->delete();
            }
        }
        return back()->with(['message' => 'Xóa thành công']);
    }

}
