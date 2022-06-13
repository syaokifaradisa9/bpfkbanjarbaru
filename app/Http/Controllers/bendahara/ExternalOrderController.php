<?php

namespace App\Http\Controllers\bendahara;

use App\Http\Controllers\Controller;
use App\Models\ExternalOrder;
use Exception;

class ExternalOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::with('user')->where('status', 'MENUNGGU PEMBAYARAN')
                                              ->orWhere('status','SELESAI')
                                              ->get();

        return view('bendahara.order.external.index',[
            'title' => 'Halaman External Order',
            'menu' => 'external',
            'orders' => $orders
        ]);
    }

    public function confirmPayment($orderId){
        try{
            $order = ExternalOrder::findOrFail($orderId);
            $order->status = "SELESAI";
            $order->save();

            return response()->json([
                'status' => 'success',
                'message' => "Sukses Mengonfirmasi Pembayaran Fasyenkes"
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => "Terjadi Kesalahan, Silahkan Coba Lagi!"
            ]);
        }
    }
}
