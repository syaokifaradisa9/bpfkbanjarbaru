<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login',[
            'title' => 'Halaman Login'
        ]);
    }

    public function verify(LoginRequest $request){
        
    }
}
