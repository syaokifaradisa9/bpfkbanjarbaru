<?php

namespace App\Http\Controllers\fasyenkes;

use Illuminate\Http\Request;
use App\Models\AlkesCategory;
use App\Models\InternalOrder;
use App\Models\InternalAlkesOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AlkesOrderDescription;

class InternalOrderController extends Controller
{
    public function index(){
        $orders = InternalOrder::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('fasyenkes.order.internal.index', [
            'title' => "Pengajuan Internal",
            'menu' => 'internal',
            'orders' => $orders,
        ]);
    }

    public function create(){
        $category = AlkesCategory::all();

        return view('fasyenkes.order.internal.create',[
            'title' => 'Tambah Pengajuan Internal',
            'menu' => 'internal',
            'categories' => $category,
        ]);
    }

    public function store(Request $request){
        $name = $request->file('covering_letter')->getClientOriginalName();
        $extension = explode('.', $name)[1];

        $newFileName = str_replace(' ', '_', Auth::guard('web')->user()->fasyenkes_name) . "_" . date("Y_m_d") . "." . $extension;
        $request->file('covering_letter')->storeAs('public/files/coverring_letter', $newFileName);

        $order = InternalOrder::create([
            'user_id' => Auth::user()->id,
            'delivery_date_estimation' => $request->delivery_date_estimation,
            'delivery_option' => $request->delivery_option,
            'delivery_travel_name' => $request->delivery_travel_name,
            'arrival_date_estimation' => $request->arrival_date_estimation,
            'covering_letter_path' => $newFileName,
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

        return redirect(route('fasyenkes.order.internal.index'))->with('success', 'Pengajuan Order Berhasil, Silahkan Tunggu Kami Konfirmasi Terlebih Dahulu!');
    }
}
