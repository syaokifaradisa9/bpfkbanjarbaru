<?php

namespace App\Http\Controllers\fasyankes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('fasyankes.home.index', [
            'title' => 'Halaman Beranda',
            'menu' => 'home'
        ]);
    }
}
