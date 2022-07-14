<?php

namespace App\Http\Controllers\yantek;

use Exception;
use Illuminate\Http\Request;
use App\Models\ExternalOrder;
use App\Http\Controllers\Controller;

class InsituOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::with('user')->get();
        return view('yantek.order.insitu.index', [
            'title' => "Order Insitu",
            'menu' => 'insitu',
            'orders' => $orders,
        ]);
    }

    public function reject(Request $request) {
        try{
            $order = ExternalOrder::findOrFail($request->id);
            $order->status = "DITOLAK";
            $order->save();

            return redirect(route('yantek.order.insitu.index'))->with('success', 'Menolak Order Sukses');
        }catch(Exception $error){
            return redirect(route('yantek.order.insitu.index'))->with('error', 'Terjadi Kesalahan, Silahkan Coba Lagi!');
        }
    }

    public function accept(Request $request) {
        try{
            $order = ExternalOrder::findOrFail($request->id);
            $order->status = "DITERIMA";
            $order->save();

            return redirect(route('yantek.order.insitu.index'))->with('success', 'Menerima Orderan Sukses');
        }catch(Exception $error) {
            return redirect(route('yantek.order.insitu.index'))->with('error', 'Terjadi Kesalahan, Silahkan Coba Lagi!');
        }
    }

    public function editAccommodation($id){
        $order = ExternalOrder::with('external_alkes_order')->findOrFail($id);
        return view('yantek.order.insitu.accommodation-edit',[
            'title' => 'Edit Insitu',
            'menu' => 'insitu',
            'order' => $order,
        ]);
    }

    public function updateAccommodation(Request $request, $id){
        $order = ExternalOrder::findOrFail($id);

        $order->accommodation = filter_var($request->accommodation_cost,FILTER_SANITIZE_NUMBER_INT);
        $order->accommodation_description = $request->accommodation_cost_description ?? '-';

        $order->daily_accommodation = filter_var($request->daily_cost,FILTER_SANITIZE_NUMBER_INT);
        $order->daily_description = $request->daily_cost_description ?? '-';

        $order->rapid_test_accommodation = filter_var($request->rapid_cost,FILTER_SANITIZE_NUMBER_INT);
        $order->rapid_test_description = $request->rapid_cost_description ?? '-';

        $order->save();

        return redirect()->route('yantek.order.insitu.index')->with('success', 'Berhasil Menetapkan Akomodasi');
    }

    public function editEstimation($id){
        $order = ExternalOrder::with('external_alkes_order')->findOrFail($id);
        
        $estimations = [];
        foreach($order->external_alkes_order as $alkes_order){
            if(!array_key_exists($alkes_order->alkes->name, $estimations)){
                $estimations[$alkes_order->alkes->name] = [
                    'minute'=> $alkes_order->alkes->minute_estimation,
                    'ammount' => 1
                ];
            }else{
                $estimations[$alkes_order->alkes->name]['ammount']++;
            }
        }

        foreach($estimations as $key => $value){
            $estimations[$key]['total_minute'] = $value['ammount'] * $value['minute'];

            $estimations[$key]['hour'] = intdiv($value['minute'], 60);
            $estimations[$key]['minute'] = $value['minute'] % 60;
            $estimations[$key]['total_hour'] = intdiv($estimations[$key]['total_minute'], 60);
            $estimations[$key]['total_minute'] = $estimations[$key]['total_minute'] % 60;
        }


        ksort($estimations, 2);
        return view('yantek.order.insitu.estimation-edit',[
            'title' => 'Edit Estimasi',
            'menu' => 'insitu',
            'estimations' => $estimations,
            'order' => $order
        ]);
    }

    public function updateEstimation(Request $request, $id){
        $order = ExternalOrder::findOrFail($id);

        $order->pp_hour = filter_var($request->pp_hour,FILTER_SANITIZE_NUMBER_INT);
        $order->pp_minute = filter_var($request->pp_minute,FILTER_SANITIZE_NUMBER_INT);
        $order->total_officer = filter_var($request->officer,FILTER_SANITIZE_NUMBER_INT);
        $order->save();

        return redirect()->route('yantek.order.insitu.index')->with('success', 'Berhasil Menetapkan Estimasi');
    }
}