<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login',[
            'title' => 'Halaman Login'
        ]);
    }

    public function verify(LoginRequest $request){
        if(!(User::where('email', $request->email)->get()->first())->isVerified()){
            return redirect(Route('login.index'))->with('error', 'Email Belum Terverifikasi, Silahkan Verifikasi Terlebih Dahulu!');
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect(Route('login.index'))->with('error', 'Email atau password salah, Silahkan Coba Lagi!');
        }

        return redirect(route('home.index'));
    }
}
