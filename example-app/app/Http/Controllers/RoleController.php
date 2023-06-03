<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Role $role){
        $role = $role->get();
        return view('admin.layouts.roles.list',compact('role'));
    }

    public function RoleFormAdd(Request $request){
        return view('admin.layouts.roles.add');
    }

    public function RoleFormPostAdd(Request $request){
        Role::create(['name' => $request->role_name]);
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

        return view('admin.layouts.roles.edit',compact('role'));
    }
    public function RoleFormUpdate(Role $role, Request $request,$id) {

        $role =  $role->findOrFail($id);
        $role->name = $request->role_name;
        $role->save();
        return back()->with(['message' => 'Cập nhật thành công']);
    }

    public function RoleDelete(Role $role,$id){
        $role->findOrFail($id)->delete();
        return back()->with(['message' => 'Xoá thành công']);
    }
}
