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
        // Upload File
        if($request->file('letter')){
            $file = $request->file('letter');
            $fileName = $request->letter_number . "_" . Auth::user()->id.".pdf";
        
            $file->move(public_path().'/letter_files', $fileName);
        }

        // Perhitungan Nomor Order Otomatis
        $last_order_position = 15;
        $last_order_position_in_db = ExternalOrder::all()->count();
        
        $new_order_pos = $last_order_position + $last_order_position_in_db;
        if($new_order_pos < 100){
            $new_order_pos = '0'. ($new_order_pos + 1);
        }

        // Store Data Order
        $order = ExternalOrder::create([
            'user_id' => Auth::user()->id,
            'letter_name' => $fileName,
            'number' => 'E - ' . $new_order_pos . '.' . ' DL',
            'letter_number' => $request->letter_number,
            'letter_date' => $request->letter_date,
        ]);

        // Store Data Alkes Order
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