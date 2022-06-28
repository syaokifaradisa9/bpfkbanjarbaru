<?php

namespace App\Http\Controllers\bendahara;

use Exception;
use App\Models\InternalOrder;
use App\Http\Controllers\Controller;

class InternalOrderController extends Controller
{
    public function index(){
        $orders = InternalOrder::where('status', 'MENUNGGU PEMBAYARAN')
                                ->orWhere('status', 'PEMBAYARAN LUNAS')
                                ->orWhere('status', 'ALAT DAN SERTIFIKAT TELAH DISERAHKAN')
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
            $order->status = "PEMBAYARAN LUNAS";
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
