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
        $fileName = '';
        if($request->file('letter')){
            $file = $request->file('letter');
            $extension = explode('.', $file->getClientOriginalName())[1];

            $fileName = date('Y-m-d-H-m').'.'.$extension;        
            $file->move(public_path('order/'.Auth::user()->id.'/internal/file'), $fileName);
        }

        $order = InternalOrder::create([
            'user_id' => Auth::user()->id,
            'delivery_date_estimation' => $request->delivery_date_estimation,
            'delivery_option' => $request->delivery_option,
            'delivery_travel_name' => $request->delivery_travel_name,
            'arrival_date_estimation' => $request->arrival_date_estimation,
            'letter_name' => $fileName,
        ]);

        for($i = 0; $i < count($request->alkes); $i++){
            $description_id = 1;
            if($request->description[$i] != null){
                $description_id = AlkesOrderDescription::create(['description' => $request->description[$i]]);
            }

            for($j = 0; $j < $request->ammount[$i]; $j++){
                InternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description_id,
                    'internal_order_id' => $order->id,
                ]);
            }
        }

        return redirect(route('fasyenkes.order.internal.index'))->with('success', 'Pengajuan Order Berhasil, Silahkan Tunggu Kami Konfirmasi Terlebih Dahulu!');
    }
}
