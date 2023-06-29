<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{

    public function index(){
        return view('admin.index');
    }
    public function login(Request $request){
        return view('admin.login');
    }

    public function loginPost(Request $request){
        $validate = FacadesValidator::make($request->all(),
        [
            'email' => "required",
            'password' => 'required'
        ]);
        if($validate->fails()){
            // return back()->with(['status' => 404, 'errors' => 'Tài khoản hoặc mật khẩu bạn chưa đúng']);

           return back()->withErrors($validate)->withInput();
        }
        $array = $request->only('email','password');
        if ($user = Auth::attempt($array)){
            session(['user' => $array]);
            return redirect()->route('admin.DashboardAdmin');
        }
        return redirect()->back()->withErrors([
            'errors' => __('validation.failed'),
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect(route('loginForm'));
    }
}
