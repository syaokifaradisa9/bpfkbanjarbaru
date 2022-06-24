<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\InternalAlkesOrder;

class InternalWorksheetController extends Controller
{
    public function index($order_id){
        $alkesOrder = InternalAlkesOrder::with('alkes', 'internal_order')
                                        ->where('internal_order_id', $order_id)
                                        ->orderBy('alkes.name')
                                        ->get();
                           
        return view('petugas.order.external.worksheet', [
            'title' => 'Lembar Kerja Pengujian dan Kalibrasi',
            'menu' => 'external',
            'alkes_orders' => $alkesOrder,
            'order_id' => $order_id,
            'order_status' => $alkesOrder[0]->external_order->status
        ]);
    }   
}
