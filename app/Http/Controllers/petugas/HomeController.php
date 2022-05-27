<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('petugas.home.index', [
            'title' => 'Halaman Home',
            'menu' => 'home'
        ]);
    }
}
