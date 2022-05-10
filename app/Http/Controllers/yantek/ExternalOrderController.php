<?php

namespace App\Http\Controllers\yantek;

use Exception;
use Illuminate\Http\Request;
use App\Models\ExternalOrder;
use App\Http\Controllers\Controller;

class ExternalOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::with('user')->get();
        return view('yantek.order.external.index', [
            'title' => "Order External",
            'menu' => 'external',
            'orders' => $orders,
        ]);
    }

    public function reject(Request $request) {
        try{
            $order = ExternalOrder::findOrFail($request->id);
            $order->status = "DITOLAK";
            $order->save();

            return redirect(route('yantek.order.external.index'))->with('success', 'Menolak Order Sukses');
        }catch(Exception $error){
            return redirect(route('yantek.order.external.index'))->with('error', 'Terjadi Kesalahan, Silahkan Coba Lagi!');
        }
    }

    public function accept(Request $request) {
        try{
            $order = ExternalOrder::findOrFail($request->id);
            $order->status = "DITERIMA";
            $order->save();

            return redirect(route('yantek.order.external.index'))->with('success', 'Menerima Orderan Sukses');
        }catch(Exception $error) {
            return redirect(route('yantek.order.external.index'))->with('error', 'Terjadi Kesalahan, Silahkan Coba Lagi!');
        }
    }
}
