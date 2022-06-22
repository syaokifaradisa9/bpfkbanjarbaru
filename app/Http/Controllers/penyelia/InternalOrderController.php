<?php

namespace App\Http\Controllers\penyelia;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Models\InternalOrder;
use App\Http\Controllers\Controller;
use App\Models\InternalOfficerOrder;

class InternalOrderController extends Controller
{
    public function index(){
        $orders = InternalOrder::where('status', '!=', 'MENUNGGU')
                                ->where('status', '!=', 'ORDER DITERIMA')
                                ->where('status', '!=', 'DITOLAK')
                                ->get();

        return view('penyelia.order.internal.index',[
            'title' => 'Halaman Order Internal',
            'menu' => 'internal',
            'orders' => $orders
        ]);
    }

    public function officeEdit($id){
        $order = InternalOrder::with('internal_alkes_order')->findOrFail($id);
        $officers = AdminUser::where('role', 'PETUGAS')->get();

        $existOfficers = InternalOfficerOrder::where('internal_order_id', $id)->get();

        $existOfficerIds = [];
        foreach($existOfficers as $officer){
            array_push($existOfficerIds, $officer->admin_user_id);
        }

        return view('penyelia.order.internal.officer-edit', [
            'title' => 'Halaman Edit Petugas',
            'menu' => 'internal',
            'order' => $order,
            'officers' => $officers,
            'officerExists' => $existOfficerIds,
        ]);
    }

    public function officeUpdate(Request $request, $id){
        // Mengambil Petugas yang dipilih
        $officerSelected = $request->all();
        unset($officerSelected['_token']);
        unset($officerSelected['_method']);

        // Pengambilan List Petugas dari Database
        $officerIds = [];
        $officers = InternalOfficerOrder::select('admin_user_id')->where('internal_order_id', $id)->get();
        foreach($officers as $officer){
            array_push($officerIds, $officer->admin_user_id);
        }

        // Menambahkan database jika pada database blm ada id petugas
        $clean_officer_selected = [];
        foreach($officerSelected as $key => $value){
            $user_id = explode('_', $key)[1];
            array_push($clean_officer_selected, $user_id);
            if(!in_array($user_id, $officerIds)){
                InternalOfficerOrder::create([
                    'admin_user_id' => $user_id,
                    'internal_order_id' => $id
                ]);
            }
        }

        // Menghapus data database jika data database tidak ada dalam data terbaru
        foreach($officerIds as $existId){
            if(!in_array($existId, $clean_officer_selected)){
                InternalOfficerOrder::where('admin_user_id', $existId)
                                    ->where('internal_order_id', $id)
                                    ->delete();
            }
        }

        return redirect(route('penyelia.order.internal.index'))->with('success', 'Sukses Menetapkan Petugas');
    }
}
