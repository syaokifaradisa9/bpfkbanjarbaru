<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function verify(Request $request){
        // Pengecekan akun admin
        if(Auth::guard('admin')->attempt($request->only('email', 'password'))){
            return redirect(route('home-redirect'));
        }

        if(Auth::guard('web')->attempt($request->only('email', 'password'))){
            return redirect(route('home-redirect'));
        }

        return redirect(Route('login.index'))->with('error', 'Email atau password salah, Silahkan Coba Lagi!');
    }
}
