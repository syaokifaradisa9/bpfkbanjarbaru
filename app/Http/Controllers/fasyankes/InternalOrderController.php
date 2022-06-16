<?php

namespace App\Http\Controllers\fasyankes;

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
        return view('fasyankes.order.internal.index', [
            'title' => "Pengajuan Internal",
            'menu' => 'internal',
            'orders' => $orders,
        ]);
    }

    public function create(){
        $category = AlkesCategory::all();

        return view('fasyankes.order.internal.create',[
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
            'contact_person_name' => $request->contact_person_name,
            'contact_person_phone' => $request->contact_person_phone,
            'letter_name' => $fileName,
        ]);

        for($i = 0; $i < count($request->alkes); $i++){
            $description_id = 1;
            if($request->description[$i] != null){
                $description_id = AlkesOrderDescription::create(['description' => $request->description[$i]])->id;
            }

            for($j = 0; $j < $request->ammount[$i]; $j++){
                InternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description_id,
                    'internal_order_id' => $order->id,
                ]);
            }
        }

        return redirect(route('fasyankes.order.internal.index'))->with('success', 'Pengajuan Order Berhasil, Silahkan Tunggu Kami Konfirmasi Terlebih Dahulu!');
    }

    public function edit($id){
        $order = InternalOrder::findOrFail($id);
        return view('fasyankes.order.internal.edit',[
            'title' => 'Edit Pengajuan Internal',
            'menu' => 'internal',
            'order' => $order,
            'categories' => AlkesCategory::with('alkes')->get()
        ]);
    }

    public function update(Request $request, $order_id){
        $order = InternalOrder::findOrFail($order_id);

        if($request->file('letter')){
            $file = $request->file('letter');
            $extension = explode('.', $file->getClientOriginalName())[1];

            $fileName = date('Y-m-d-H-m').'.'.$extension;        
            $file->move(public_path('order/'.Auth::user()->id.'/internal/file'), $fileName);
            unlink($order->letter_path);

            $order->letter_name = $fileName;
        }
        
        $order->delivery_date_estimation = $request->delivery_date_estimation;
        $order->delivery_option = $request->delivery_option;
        $order->delivery_travel_name = $request->delivery_travel_name;
        $order->arrival_date_estimation = $request->arrival_date_estimation;
        $order->contact_person_name = $request->contact_person_name;
        $order->contact_person_phone = $request->contact_person_phone;
        $order->status = "MENUNGGU";
        $order->save();

        // Menghapus Semua Data Order
        InternalAlkesOrder::where('internal_order_id',$order_id)->delete();
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

        return redirect(route('fasyankes.order.internal.index'))->with('success', 'Edit Pengajuan Order Berhasil');
    }
}
