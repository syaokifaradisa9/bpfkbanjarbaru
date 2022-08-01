<?php

namespace App\Http\Controllers\penyelia;

use App\Models\AdminUser;
use Illuminate\Http\Request;
use App\Models\InternalOrder;
use App\Http\Controllers\Controller;
use App\Models\InternalAlkesOrder;
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
        $officers = AdminUser::where('role', 'PETUGAS')->orderBy('name')->get();

        return view('penyelia.order.internal.officer-edit', [
            'title' => 'Halaman Edit Petugas',
            'menu' => 'internal',
            'order' => $order,
            'officers' => $officers
        ]);
    }

    public function officeUpdate(Request $request, $id){
        $alkesOrders = $request->alkes_order;
        foreach($alkesOrders as $index => $alkesOrderId){
            for($i = 0; $i < $request->ammount[$index]; $i++){
                InternalOfficerOrder::create([
                    'admin_user_id' => $request->officers[$index],
                    'internal_alkes_order_id' => $alkesOrderId
                ]);
            }
        }

        return redirect(route('penyelia.order.internal.index'))->with('success', 'Sukses Menetapkan Petugas');
    }
}
