<?php

namespace App\Http\Controllers\fasyenkes;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('fasyenkes.home.index', [
            'title' => 'Halaman Beranda',
            'menu' => 'home'
        ]);
    }
}
