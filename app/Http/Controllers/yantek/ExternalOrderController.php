<?php

namespace App\Http\Controllers\yantek;

use App\Http\Controllers\Controller;
use App\Models\ExternalOrder;

class ExternalOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::all();
        return view('yantek.order.external.index', [
            'title' => "Order External",
            'menu' => 'external',
            'orders' => $orders,
        ]);
    }
}
