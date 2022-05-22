<?php

namespace App\Http\Controllers\penyelia;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('penyelia.home.index', [
            'title' => 'Halaman Home',
            'menu' => 'home'
        ]);
    }
}
