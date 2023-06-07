<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function login(Request $request){
        return view('admin.login');
    }

    public function loginPost(Request $request){
        $array = $request->only('email','password');
        if (Auth::attempt($array)){
            return redirect()->route('admin.DashboardAdmin');
        }
        return back();
    }
}
