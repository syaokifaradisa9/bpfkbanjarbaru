<?php

namespace App\Http\Controllers\petugas;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use App\Models\AlkesOrderDescription;
use App\Models\InternalAlkesOrder;
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

            $order->status = 'ORDER DITERIMA';
            $order->description = $request->description;
            $order->save();

            return redirect(route('petugas.order.internal.index'))->with('success','Berhasil Mengupdate Status');
        }else{
            return redirect(route('petugas.order.internal.index'));
        }
    }

    public function alkesReceptionPage($id){
        $order = InternalOrder::findOrFail($id);

        $orders = [];
        foreach($order->alkes_order_with_category as $category => $alkesOrder){
            foreach($alkesOrder as $alkesName => $value){
                array_push($orders, [
                    'alkes-id' => $value['alkes-id'],
                    'alkes' => $alkesName,
                    'ammount' => $value['ammount'],
                    'description' => $value['description']
                ]);
            }
        }

        usort($orders, function ($item1, $item2) {
            return $item1['alkes'] <=> $item2['alkes'];
        });
        
        return view('petugas.order.internal.alkes-reception',[
            'title' => 'Halaman Penerimaan Alat Kesehatan',
            'menu' => 'internal',
            'order' => $order,
            'orders' => $orders,
            'officers' => AdminUser::where('role','PETUGAS')->orderBy('name')->get()
        ]);
    }

    public function alkesReceptionStore(Request $request, $id){
        $order = InternalOrder::findOrFail($id);

        // Pemeriksa Alat
        $order->alkes_checker = $request->checker;

        // Status Penerimaan Alat
        $order->review_request = $request->review_request == "on";
        $order->calibration_ability = $request->calibration_ability == "on";
        $order->officer_readiness = $request->officer_readiness == "on";
        $order->workload = $request->workload == "on";
        $order->equipment_condition = $request->equipment_condition == "on";
        $order->calibration_method_compatibility = $request->calibration_method_compatibility == "on";
        $order->accommodation_and_environment = $request->accommodation_and_environment == "on";

        // Update Status Order
        $order->status = "ALAT DITERIMA";

        // Menyimpan Perubahan
        $order->save();

        InternalAlkesOrder::where('internal_order_id', $id)->delete();
        foreach($request->ammount as $index => $loop){
            for($i = 0; $i < $loop; $i++){
                $description = AlkesOrderDescription::where('description', $request->description[$index])->get()->first();
                $description_id = $description->id ?? AlkesOrderDescription::create([
                    'description' => $request->description[$index]
                ])->id;

                InternalAlkesOrder::Create([
                    'alkes_id' => $request->alkes[$index],
                    'internal_order_id' => $id,
                    'client_description_id' => $request->description_client_id[$index],
                    'admin_description_id' => $description_id,
                    'merk' => $request->merk[$index],
                    'model' => $request->model[$index],
                    'series_number' => $request->series_number[$index],
                    'function' => $request['function_'.$index]
                ]);
            }
        }

        return redirect(route('petugas.order.internal.index'))->with('success', 'Berhasil Mengonfirmasi Penerimaan Alat Datang');
    }
}
