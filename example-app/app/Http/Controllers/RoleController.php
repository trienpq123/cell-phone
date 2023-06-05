<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Role $role){
        $role = $role->all();
        return view('admin.layouts.roles.list',compact('role'));
    }

    public function RoleFormAdd(Request $request, Permission $permission){
        $permission = $permission->all();
        return view('admin.layouts.roles.add',compact('permission'));
    }

    public function RoleFormPostAdd(Request $request){
        $role = Role::create(['name' => $request->role_name]);
        $role->syncPermissions($request->permission);
        return back()->with(['message' => "Thêm thành công"]);
    }

    public function getDataForApi(Role $role){
        return response()->json([
            'status' => 200,
            'data' => $role->pluck('name')->all()
        ]);
    }

    public function RoleFormEdit(Role $role,$id) {

        $role = $role->findorFail($id);
        $role_has_permission = $role->getAllPermissions();
        $permission = Permission::all();
        return view('admin.layouts.roles.edit',compact('role','permission','role_has_permission'));
    }
    public function RoleFormUpdate(Role $role, Request $request,$id) {

        $role =  $role->findOrFail($id);
        $role->name = $request->role_name;
        $role->syncPermissions($request->permission);
        $role->save();
        return back()->with(['message' => 'Cập nhật thành công']);
    }

    public function RoleDelete(Role $role,$id){

       $role = $role->findOrFail($id);
       $role->syncPermissions([]);
       $role->delete();
        return back()->with(['message' => 'Xoá thành công']);
    }
}
