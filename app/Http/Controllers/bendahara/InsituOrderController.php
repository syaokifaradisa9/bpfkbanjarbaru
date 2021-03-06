<?php

namespace App\Http\Controllers\bendahara;

use Exception;
use App\Models\ExternalOrder;
use App\Http\Controllers\Controller;

class InsituOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::with('user')->where('status', 'MENUNGGU PEMBAYARAN')
                                              ->orWhere('status','SELESAI')
                                              ->get();

        return view('bendahara.order.insitu.index',[
            'title' => 'Halaman Order Insitu',
            'menu' => 'insitu',
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
