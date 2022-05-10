<?php

namespace App\Http\Controllers\fasyenkes;

use Illuminate\Http\Request;
use App\Models\AlkesCategory;
use App\Models\ExternalOrder;
use App\Models\ExternalAlkesOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AlkesOrderDescription;

class ExternalOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('fasyenkes.order.external.index', [
            'title' => 'Pengajuan External',
            'menu' => 'external',
            'orders' => $orders,
        ]);
    }

    public function create(){
        $category = AlkesCategory::all();

        return view('fasyenkes.order.external.create',[
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
            $description_id = 1;
            if($request->description[$i] != null){
                $description_id = AlkesOrderDescription::create(['description' => $request->description[$i]]);
            }


            for($j = 0; $j < $request->ammount[$i]; $j++){
                ExternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description_id,
                    'external_order_id' => $order->id,
                ]);
            }
        }

        return redirect(route('fasyenkes.order.external.index'))->with('success', 'Pengajuan Order Berhasil, Silahkan Tunggu Kami Konfirmasi Terlebih Dahulu!');
    }

    public function cancel(Request $request){
        ExternalAlkesOrder::where('external_order_id', $request->id)->delete();
        ExternalOrder::find($request->id)->delete();

        return redirect(route('fasyenkes.order.external.index'))->with('success', 'Membatalkan Pengajuan Berhasil, Kami Tidak akan Memproses Pengajuan Anda!');
    }
}