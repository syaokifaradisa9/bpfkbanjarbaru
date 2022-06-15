<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\InternalOrder;
use Illuminate\Http\Request;

class InternalOrderController extends Controller
{
    public function index(){
        $orders = InternalOrder::orderBy('arrival_date_estimation')->get();
                           
        return view('petugas.order.internal.index', [
            'title' => 'Halaman Order Internal',
            'menu' => 'internal',
            'orders' => $orders
        ]);
    }
}
