<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\ExternalOfficerOrder;
use Illuminate\Support\Facades\Auth;

class ExternalOrderController extends Controller
{
    public function index(){
        $officerOrders = ExternalOfficerOrder::with('external_order')
                                ->where('admin_user_id', Auth::guard('admin')->user()->id)
                                ->get();

        $orders = [];
        foreach($officerOrders as $order){
            array_push($orders, $order->external_order);
        }
        
        return view('petugas.order.external.index', [
            'title' => 'Halaman Order External',
            'menu' => 'external',
            'orders' => $orders
        ]);
    }
}
