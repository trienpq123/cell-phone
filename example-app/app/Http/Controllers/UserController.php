<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(User $User){
        $User = $User->all();
        return view('admin.layouts.user.list',compact('User'));
    }

    public function UserFormAdd(Request $request){
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.layouts.user.add',compact('role','permission'));
    }

    public function UserFormPostAdd(Request $request){
        $user = new User();
        $user->name = $request->fullName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        if($request->role){
            $user->assignRole($request->role);
        }
        if($request->permission){

            $user->givePermissionTo($request->permission);
        }
        return back()->with(['message' => "Thêm thành công"]);
    }

    public function getDataForApi(User $User){
        return response()->json([
            'status' => 200,
            'data' => $User->pluck('name')->all()
        ]);
    }

    public function UserFormEdit(User $User,$id) {
        $User = $User->findorFail($id);
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.layouts.user.edit',compact('User','role','permission'));
    }
    public function UserFormUpdate(User $User, Request $request,$id) {
        $User = $User->findOrFail($id);
        $User->name = $request->fullName;
        $User->email = $request->email;
        $User->username = $request->username;
        $User->save();
        if($request->role){
            $User->syncRoles($request->role);
        }
        if($request->permission){
           $User->syncPermissions($request->permission);

        }
        return back()->with(['message' => 'Cập nhật thành công']);
    }

    public function UserDelete(User $User,$id){
        $User->findOrFail($id)->delete();
        return back()->with(['message' => 'Xoá thành công']);
    }
}
