<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\ExternalOfficerOrder;
use Illuminate\Support\Facades\Auth;

class InsituOrderController extends Controller
{
    public function index(){
        $officerOrders = ExternalOfficerOrder::with('external_order')
                                ->where('admin_user_id', Auth::guard('admin')->user()->id)
                                ->get();

        $orders = [];
        foreach($officerOrders as $order){
            $status_order = $order->external_order->status;

            $condition1 = ($status_order == "DALAM PERJALANAN");
            $condition2 = ($status_order == "PENGERJAAN");
            $condition3 = ($status_order == "MENUNGGU PEMBAYARAN");
            $condition4 = ($status_order == "SELESAI");

            if($condition1 || $condition2 || $condition3 || $condition4){
                array_push($orders, $order->external_order);
            }
        }
        
        return view('petugas.order.insitu.index', [
            'title' => 'Halaman Order Insitu',
            'menu' => 'insitu',
            'orders' => $orders
        ]);
    }
}
