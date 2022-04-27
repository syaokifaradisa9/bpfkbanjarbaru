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

        // Pengecekan akun user fasyenkes
        if(!(User::where('email', $request->email)->get()->first())->isVerified()){
            return redirect(Route('login.index'))->with('error', 'Email Belum Terverifikasi, Silahkan Verifikasi Terlebih Dahulu!');
        }

        if(!Auth::attempt($request->only('email', 'password'))){
            return redirect(Route('login.index'))->with('error', 'Email atau password salah, Silahkan Coba Lagi!');
        }

        return redirect(route('home-redirect'));
    }
}
