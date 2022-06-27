<?php

namespace App\Http\Controllers\bendahara;

use App\Http\Controllers\Controller;
use App\Models\InternalOrder;
class InternalOrderController extends Controller
{
    public function index(){
        $orders = InternalOrder::where('status', 'MENUNGGU PEMBAYARAN')
                                ->orWhere('status', 'SELESAI')
                                ->get();

        return view('bendahara.order.internal.index', [
            'title' => 'Halaman Order Internal',
            'menu' => 'internal',
            'orders' => $orders,
        ]);
    }

    public function confirmPayment($orderId){
        try{
            $order = InternalOrder::findOrFail($orderId);
            $order->status = "SELESAI";
            $order->save();

            return response()->json([
                'status' => 'success',
                'message' => "Sukses Mengonfirmasi Pembayaran Fasyankes"
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => "Terjadi Kesalahan, Silahkan Coba Lagi!"
            ]);
        }
    }
}
