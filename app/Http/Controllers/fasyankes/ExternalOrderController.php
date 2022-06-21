<?php

namespace App\Http\Controllers\fasyankes;

use Illuminate\Http\Request;
use App\Models\AlkesCategory;
use App\Models\ExternalOrder;
use App\Models\ExternalAlkesOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AlkesOrderDescription;
use Exception;

class ExternalOrderController extends Controller
{
    public function index(){
        $orders = ExternalOrder::where('user_id', Auth::guard('web')->user()->id)
                                ->orderBy('created_at', 'DESC')->get();
                                
        return view('fasyankes.order.external.index', [
            'title' => 'Pengajuan External',
            'menu' => 'external',
            'orders' => $orders,
        ]);
    }

    public function create(){
        $category = AlkesCategory::all();
        return view('fasyankes.order.external.create',[
            'title' => 'Tambah Pengajuan External',
            'menu' => 'external',
            'categories' => $category,
        ]);
    }

    public function store(Request $request){
        // Upload File
        $fileName = '';
        if($request->file('letter')){
            $file = $request->file('letter');
            $extension = explode('.', $file->getClientOriginalName())[1];

            $fileName = date('Y-m-d-H-m').'.'.$extension;        
            $file->move(public_path('order/'.Auth::user()->id.'/external/file'), $fileName);
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
            if($request->description[$i]){
                $existDescription = AlkesOrderDescription::where('description', $request->description[$i])->get()->first();
                $description_id = $existDescription->id ?? AlkesOrderDescription::create(['description' => $request->description[$i]])->id;
            }

            for($j = 0; $j < $request->ammount[$i]; $j++){
                ExternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description_id,
                    'external_order_id' => $order->id,
                ]);
            }
        }

        return redirect(route('fasyankes.order.external.index'))->with('success', 'Pengajuan Order Berhasil, Silahkan Tunggu Kami Konfirmasi Terlebih Dahulu!');
    }

    public function edit($id){
        $order = ExternalOrder::findOrFail($id);
        return view('fasyankes.order.external.edit',[
            'title' => 'Edit Pengajuan External',
            'menu' => 'external',
            'order' => $order,
            'categories' => AlkesCategory::with('alkes')->get()
        ]);
    }

    public function update(Request $request, $order_id){
        if($request->file('letter')){
            $file = $request->file('letter');
            $fileName = $request->letter_number . "_" . Auth::user()->id.".pdf";
        
            $file->move(public_path().'/letter_files', $fileName);
        }

        $order = ExternalOrder::findOrFail($order_id);
        $order->letter_number = $request->letter_number;
        $order->letter_date = $request->letter_date;
        $order->save();

        // Menghapus Semua Data Order
        ExternalAlkesOrder::where('external_order_id',$order_id)->delete();
        for($i = 0; $i < count($request->alkes); $i++){
            $description_id = 1;
            if($request->description[$i]){
                $existDescription = AlkesOrderDescription::where('description', $request->description[$i])->get()->first();
                $description_id = $existDescription->id ?? AlkesOrderDescription::create(['description' => $request->description[$i]])->id;
            }

            for($j = 0; $j < $request->ammount[$i]; $j++){
                ExternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description_id,
                    'external_order_id' => $order->id,
                ]);
            }
        }

        return redirect(route('fasyankes.order.external.index'))->with('success', 'Edit Pengajuan Order Berhasil');
    }

    public function cancel($order_id){
        try{
            $order = ExternalOrder::findOrFail($order_id);

            // Validasi Aksi Fasyankes
            if($order->user->id != Auth::user()->id){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Akses Ditolak!'
                ]);
            }

            // Validasi Status Order
            if($order->status != 'TERKIRIM'){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Akses Ditolak!'
                ]);
            }

            // Update Status
            $order->status = 'DIBATALKAN';
            $order->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Sukses Membatalkan Order!'
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Membatalkan Order, Silahkan Coba Lagi!'
            ]);
        }
    }

    public function updateApprovalLetter(Request $request, $id){
        $file = $request->file('letter');
        $extension = explode('.', $file->getClientOriginalName())[1];

        $fileName = date('Y-m-d-H-m').'.'.$extension;        
        $file->move(public_path('order/'.Auth::user()->id.'/external/file'), $fileName);

        $order = ExternalOrder::findOrFail($id);
        $order->approval_letter_name = $fileName;
        $order->save();

        return redirect(route('fasyankes.order.external.index'))->with('success', 'Sukses Mengirim Surat Persetujuan');
    }
}
