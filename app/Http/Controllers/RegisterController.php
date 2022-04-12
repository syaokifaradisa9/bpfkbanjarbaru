<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register', [
            'title' => 'Halaman Register'
        ]);
    }

    public function store(RegisterRequest $request){

    }
}
