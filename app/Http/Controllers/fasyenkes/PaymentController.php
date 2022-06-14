<?php

namespace App\Http\Controllers\fasyenkes;
use App\Http\Controllers\Controller;
use App\Models\ExternalOrder;
use App\Models\ExternalPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function index($id){
        $order = '';
        $menu = '';
        if(str_contains(Route::current()->getName(), 'external')){
            $order = ExternalOrder::findOrFail($id);
            $menu = 'external';
        }
        
        return view('fasyenkes.payment.upload-form',[
            'total_payment' => $order->total_payment,
            'files' => $order->external_payment,
            'order_number' => $order->number,
            'order_id' => $id,
            'title' => 'Pembayaran',
            'menu' => $menu
        ]);
    }

    public function payment_store(Request $request, $id){
        $order = '';
        if(str_contains(Route::current()->getName(), 'external')){
            $order = ExternalOrder::findOrFail($id);
        }

        foreach($request->file('payment_file') as $index => $file){
            $fileName = $index.".".$file->extension();
            $file->move(public_path().'/file_order/external/'.str_replace(' ','', $order->number).'/payment', $fileName);

            if(str_contains(Route::current()->getName(), 'external')){
                ExternalPayment::create([
                    'file_name' => $fileName,
                    'external_order_id' => $id
                ]);
            }
        }

        return redirect(route('fasyenkes.order.external.index'))->with('success','Sukses Mengirimkan File Bukti Pembayaran');
    }

    public function orderBilling($id){
        $data = ExternalOrder::findOrFail($id);

        $orders = [];
        foreach($data->alkes_order_with_category as $category => $alkesOrder){
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
