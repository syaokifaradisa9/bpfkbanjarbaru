<?php

namespace App\Http\Controllers\fasyankes;

use Illuminate\Http\Request;
use App\Models\ExternalOrder;
use App\Models\InternalOrder;
use App\Models\ExternalPayment;
use App\Models\InternalPayment;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class PaymentController extends Controller
{
    public function index($id){
        $orderType = explode('.', Route::current()->getName())[2];
        $order = '';
        $menu = '';
        if(str_contains(Route::current()->getName(), 'external')){
            $order = ExternalOrder::findOrFail($id);
            $menu = 'external';
        }else{
            $order = InternalOrder::findOrFail($id);
            $menu = 'internal';
        }
        
        return view('fasyankes.payment.upload-form',[
            'total_payment' => $order->total_payment,
            'files' => $order->external_payment ?? $order->internal_payment,
            'order_number' => $order->number,
            'order_id' => $id,
            'title' => 'Pembayaran',
            'menu' => $menu,
            'order_type' => $orderType
        ]);
    }

    public function payment_store(Request $request, $id){
        $orderType = explode('.', Route::current()->getName())[2];
        $order = '';

        if($orderType == "external"){
            $order = ExternalOrder::findOrFail($id);
        }else{
            $order = InternalOrder::findOrFail($id);
        }

        foreach($request->file('payment_file') as $index => $file){
            $fileName = $index.".".$file->extension();
            $file->move(public_path().'/file_order/'.$orderType.'/'.str_replace(' ','', $order->number).'/payment', $fileName);

            if(str_contains(Route::current()->getName(), 'external')){
                ExternalPayment::create([
                    'file_name' => $fileName,
                    'external_order_id' => $id
                ]);
            }else{
                InternalPayment::create([
                    'file_name' => $fileName,
                    'internal_order_id' => $id
                ]);
            }
        }

        return redirect(route('fasyankes.order.'.$orderType.'.index'))->with('success','Sukses Mengirimkan File Bukti Pembayaran');
    }

    public function orderBilling($id){
        $orderType = explode('.', Route::current()->getName())[2];
        if($orderType == "external"){
            $data = ExternalOrder::findOrFail($id);
        }else{
            $data = InternalOrder::findOrFail($id);
        }

        $orders = [];
        foreach($data->done_alkes_order as $category => $alkesOrder){
            foreach($alkesOrder as $alkesName => $alkesValue){
                $orders[$alkesName] = $alkesValue;
            }
        }
        ksort($orders);

        $pdf = Pdf::loadView('report.order_billing',[
            'alkesOrders' => $orders,
            'order' => $data
        ])->setPaper('a4','portrait');

        return $pdf->stream("tes.pdf");
    }
}
