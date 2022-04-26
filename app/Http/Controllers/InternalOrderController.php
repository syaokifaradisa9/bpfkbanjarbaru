<?php

namespace App\Http\Controllers;

use App\Models\AlkesCategory;
use App\Models\AlkesOrderDescription;
use App\Models\InternalAlkesOrder;
use App\Models\InternalOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InternalOrderController extends Controller
{
    public function index(){
        $orders = InternalOrder::all();
        return view('order.internal.index', [
            'title' => "Pengajuan Internal",
            'menu' => 'internal',
            'orders' => $orders,
        ]);
    }

    public function create(){
        $category = AlkesCategory::all();

        return view('order.internal.create',[
            'title' => 'Tambah Pengajuan Internal',
            'menu' => 'internal',
            'categories' => $category,
        ]);
    }

    public function store(Request $request){
        $order = InternalOrder::create([
            'user_id' => Auth::user()->id,
            'delivery_date_estimation' => $request->delivery_date_estimation,
            'delivery_option' => $request->delivery_option,
            'delivery_travel_name' => $request->delivery_travel_name,
            'arrival_date_estimation' => $request->arrival_date_estimation,
            'covering_letter_path' => ''
        ]);

        for($i = 0; $i < count($request->alkes); $i++){
            $description = AlkesOrderDescription::create(['description' => $request->description[$i]]);
            for($j = 0; $j < $request->ammount[$i]; $j++){
                InternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description->id,
                    'internal_order_id' => $order->id,
                ]);
            }
        }

        return redirect(route('order.internal'))->with('success', 'Pengajuan Order Berhasil, Silahkan Tunggu Kami Konfirmasi Terlebih Dahulu!');
    }
}
