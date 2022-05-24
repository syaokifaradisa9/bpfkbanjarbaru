<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login',['title' => 'Halaman Login']);
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
