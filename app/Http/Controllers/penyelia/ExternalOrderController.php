<?php

namespace App\Http\Controllers\penyelia;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Models\ExternalOrder;
use App\Models\ActivityDateOrder;
use App\Http\Controllers\Controller;
use App\Models\ExternalOfficerOrder;

class ExternalOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::with('external_alkes_order')
                                ->where('status','DISETUJUI')
                                ->orWhere('status','DITERIMA')
                                ->orWhere('status','DALAM PERJALANAN')
                                ->orWhere('status','PENGERJAAN')
                                ->orWhere('status','MENUNGGU PEMBAYARAN')
                                ->orWhere('status','SELESAI')
                                ->get();

        return view('penyelia.order.external.index', [
            'title' => 'Halaman Order',
            'menu' => 'external',
            'orders' => $orders
        ]);
    }

    public function officeEdit($id){
        $officers = AdminUser::where('role', 'PETUGAS')->orderBy('name', 'asc')->get();
        $order = ExternalOrder::findOrFail($id);

        $existOfficers = ExternalOfficerOrder::where('external_order_id', $id)->get();

        $existOfficerIds = [];
        $chiefOfficer = 0;
        foreach($existOfficers as $officer){
            if($officer->role == "Ketua"){
                $chiefOfficer = $officer->admin_user_id;
            }else{
                array_push($existOfficerIds, $officer->admin_user_id);
            }
        }

        return view('penyelia.order.external.officer-edit', [
            'title' => 'Halaman Edit Petugas',
            'menu' => 'external',
            'officers' => $officers,
            'order' => $order,
            'chiefOfficer' => $chiefOfficer,
            'officerExists' => $existOfficerIds,
        ]);
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

            // Estimasi 
            $estimations[$key]['hour'] = intdiv($value['minute'], 60);
            $estimations[$key]['minute'] = $value['minute'] % 60;

            $estimations[$key]['total_hour'] = intdiv($estimations[$key]['total_minute'], 60);
            $estimations[$key]['total_minute'] = $estimations[$key]['total_minute'] % 60;
        }

        ksort($estimations, 2);
        return view('penyelia.order.external.estimation-edit',[
            'title' => 'Edit Estimasi',
            'menu' => 'external',
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

        return redirect()->route('penyelia.order.external.index')->with('success', 'Berhasil Menetapkan Estimasi');
    }

    public function officeUpdate(Request $request, $id){
        // Menambahkan Tanggal Kegiatan ke Database
        ActivityDateOrder::where('external_order_id', $id)->delete();
        for($i = 0; $i < count($request->start_date); $i++){
            ActivityDateOrder::create([
                'start_date' => $request->start_date[$i],
                'end_date' => $request->end_date[$i],
                'external_order_id' => $id
            ]);
        }

        // Mengambil Petugas yang dipilih
        $officerSelected = $request->all();
        unset($officerSelected['_token']);
        unset($officerSelected['start_date']);
        unset($officerSelected['end_date']);

        $order_id = $id;

        // Filter Data
        $chiefOfficerSelected = array_filter(array_keys($officerSelected), function ($officer){
            return explode("_",$officer)[0] == "chief";
        });
        $officerSelected = array_filter(array_keys($officerSelected), function ($officer){
            return explode("_",$officer)[0] != "chief";
        });

        // Validasi Ketua Tim
        $selectedChiefId = explode("_", $chiefOfficerSelected[0])[1];
        $chiefOfficer = ExternalOfficerOrder::where('external_order_id', $order_id)->where('role','Ketua')->get();
        if(count($chiefOfficer) > 0){
            if($chiefOfficer[0]->admin_user_id != $selectedChiefId){
                $chiefOfficer[0]->admin_user_id = $selectedChiefId;
                $chiefOfficer[0]->save();   
            }
        }else{
            ExternalOfficerOrder::create([
                'admin_user_id' => $selectedChiefId,
                'external_order_id' => $order_id,
                'role' => 'Ketua'
            ]);
        }

        // Pengambilan List Petugas dari Database
        $officerIds = [];
        $officers = ExternalOfficerOrder::select('admin_user_id')->where('external_order_id', $order_id)->where('role','Anggota')->get();
        foreach($officers as $officer){
            array_push($officerIds, $officer->admin_user_id);
        }

        // Menambahkan database jika pada database blm ada id petugas
        $clean_officer_selected = [];
        foreach($officerSelected as $value){
            $user_id = explode('_', $value)[1];
            array_push($clean_officer_selected, $user_id);
            if(!in_array($user_id, $officerIds)){
                ExternalOfficerOrder::create([
                    'admin_user_id' => $user_id,
                    'external_order_id' => $order_id,
                    'role' => 'Anggota'
                ]);
            }
        }

        // Menghapus data database jika data database tidak ada dalam data terbaru
        foreach($officerIds as $id){
            if(!in_array($id, $clean_officer_selected)){
                ExternalOfficerOrder::where('admin_user_id', $id)
                                    ->where('external_order_id', $order_id)
                                    ->delete();
            }
        }

        return redirect(route('penyelia.order.external.index'))->with('success', 'Sukses Menetapkan Petugas');
    }
}
