<?php

namespace App\Http\Controllers\yantek;

use Exception;
use Illuminate\Http\Request;
use App\Models\InternalOrder;
use App\Http\Controllers\Controller;

class InternalOrderController extends Controller
{
    public function index(){
        $orders = InternalOrder::all();
        return view('yantek.order.internal.index',[
            'title' => "Order Internal",
            'menu' => 'internal',
            'orders' => $orders,
        ]);
    }

    public function reject(Request $request) {
        try{
            $order = InternalOrder::findOrFail($request->order_id);
            $order->status = "DITOLAK";
            $order->save();

            return redirect(route('yantek.order.internal.index'))->with('success', 'Menolak Order Sukses');
        }catch(Exception $error){
            return redirect(route('yantek.order.internal.index'))->with('error', 'Terjadi Kesalahan, Silahkan Coba Lagi!');
        }
    }

    public function accept(Request $request) {
        try{
            $order = InternalOrder::findOrFail($request->order_id);
            $order->status = "DITERIMA";
            $order->save();

            return redirect(route('yantek.order.internal.index'))->with('success', 'Menerima Orderan Sukses');
        }catch(Exception $error) {
            return redirect(route('yantek.order.internal.index'))->with('error', 'Terjadi Kesalahan, Silahkan Coba Lagi!');
        }
    }
}
