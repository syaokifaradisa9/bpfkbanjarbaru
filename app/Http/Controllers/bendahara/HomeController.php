<?php

namespace App\Http\Controllers\bendahara;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('bendahara.home.index',[
            'title' => 'Halaman Beranda',
            'menu' => 'home'
        ]);
    }
}
