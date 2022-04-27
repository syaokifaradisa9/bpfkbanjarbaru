<?php

namespace App\Http\Controllers\yantek;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        return view('yantek.home.index',[
            'title' => 'Dashboard Yantek',
            'menu' => 'home',
        ]);
    }
}
