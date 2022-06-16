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

    public function updateStatus(Request $request, $order_id){
        $order = InternalOrder::findOrFail($order_id);
        if($order->status == "MENUNGGU"){
            if($request->status == "DITERIMA"){
                $orderCount = InternalOrder::whereYear('created_at',date('Y', strtotime(now())))
                                        ->where('status', '!=', 'DITOLAK')
                                        ->where('status', '!=', 'MENUNGGU')
                                        ->get()->count() + 1;

                $order_number = str_pad($orderCount, 3, "0", STR_PAD_LEFT);
                $order->number = 'E - '. $order_number . ' DT';
            }

            $order->status = $request->status;
            $order->description = $request->description;
            $order->save();

            return redirect(route('petugas.order.internal.index'))->with('success','Berhasil Mengupdate Status');
        }else{
            return redirect(route('petugas.order.internal.index'));
        }
    }
}
