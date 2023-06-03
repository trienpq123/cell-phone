<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index(Permission $permission){
        $permission = $permission->get();
        return view('admin.layouts.permission.list',compact('permission'));
    }

    public function PermissionFormAdd(Request $request){
        return view('admin.layouts.permission.add');
    }

    public function PermissionFormPostAdd(Request $request){
        Permission::create(['name' => $request->permission_name]);
        return back()->with(['message' => "Thêm thành công"]);
    }

    public function getDataForApi(Permission $permission){
        return response()->json([
            'status' => 200,
            'data' => $permission->pluck('name')->all()
        ]);
    }

    public function PermissionFormEdit(Permission $permission,$id) {
        $permission = $permission->findorFail($id);

        return view('admin.layouts.roles.edit',compact('permission'));
    }
    public function PermissionFormUpdate(Permission $permission, Request $request,$id) {

        $permission =  $permission->findOrFail($id);
        $permission->name = $request->permission_name;
        $permission->save();
        return back()->with(['message' => 'Cập nhật thành công']);
    }

    public function PermissionDelete(Permission $permission,$id){
        $permission->findOrFail($id)->delete();
        return back()->with(['message' => 'Xoá thành công']);
    }
}
