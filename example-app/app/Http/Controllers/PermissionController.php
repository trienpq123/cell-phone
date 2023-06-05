<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(Permission $permission){
        $permission = $permission->get();
    //    dd( $permission->roles());
        return view('admin.layouts.permission.list',compact('permission'));
    }

    public function PermissionFormAdd(Role $role){
        $role = $role->all();
        return view('admin.layouts.permission.add',compact('role'));
    }

    public function PermissionFormPostAdd(Request $request){

       $permission =  Permission::create(['name' => $request->permission]);
        if($request->role){
            $permission->assignRole($request->role);
        }
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
        $role = Role::all();
        return view('admin.layouts.permission.edit',compact('permission','role'));
    }
    public function PermissionFormUpdate(Permission $permission, Request $request,$id) {

        $permission =  $permission->findOrFail($id);
        $permission->name = $request->permission_name;
        if($request->role){
            $permission->syncRoleS($request->role);
        }
        $permission->save();
        return back()->with(['message' => 'Cập nhật thành công']);
    }

    public function PermissionDelete(Permission $permission,$id){
        $permission->findOrFail($id)->delete();
        return back()->with(['message' => 'Xoá thành công']);
    }
}
