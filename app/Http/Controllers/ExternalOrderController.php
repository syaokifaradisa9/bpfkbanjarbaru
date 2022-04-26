<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlkesCategory;
use App\Models\ExternalOrder;
use Illuminate\Support\Facades\Auth;
use App\Models\AlkesOrderDescription;
use App\Models\ExternalAlkesOrder;

class ExternalOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::all();
        return view('order.external.index', [
            'title' => 'Pengajuan External',
            'menu' => 'external',
            'orders' => $orders,
        ]);
    }

    public function create(){
        $category = AlkesCategory::all();

        return view('order.external.create',[
            'title' => 'Tambah Pengajuan External',
            'menu' => 'external',
            'categories' => $category,
        ]);
    }

    public function store(Request $request){
        $order = ExternalOrder::create([
            'user_id' => Auth::user()->id,
            'covering_letter_path' => ''
        ]);

        for($i = 0; $i < count($request->alkes); $i++){
            $description = AlkesOrderDescription::create(['description' => $request->description[$i]]);
            for($j = 0; $j < $request->ammount[$i]; $j++){
                ExternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description->id,
                    'external_order_id' => $order->id,
                ]);
            }
        }

        return redirect(route('order.external'))->with('success', 'Pengajuan Order Berhasil, Silahkan Tunggu Kami Konfirmasi Terlebih Dahulu!');
    }
}
