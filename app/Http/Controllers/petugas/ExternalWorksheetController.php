<?php

namespace App\Http\Controllers\petugas;

use Illuminate\Http\Request;
use App\Models\ExternalAlkesOrder;
use App\Http\Controllers\Controller;

class ExternalWorksheetController extends Controller
{
    public function index($order_id){
        $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order')
                            ->where('external_order_id', $order_id)->orderBy('alkes_id')->get();
                            
        return view('petugas.order.external.worksheet', [
            'title' => 'Lembar Kerja Pengujian dan Kalibrasi',
            'menu' => 'external',
            'alkes_orders' => $alkesOrder,
            'order_id' => $order_id
        ]);
    }

    public function excelWorksheet($order_id, $alkes_order_id){
        $alkesOrder = ExternalAlkesOrder::with('alkes')->findOrFail($alkes_order_id);
        
        $orderByAlkes = ExternalAlkesOrder::where('external_order_id', $order_id)
                            ->where('alkes_id', $alkesOrder->alkes->id)->get();

        $certificate_number = 1;
        foreach($orderByAlkes as $data){
            if($data->status == 1){
                $certificate_number++;
            }
        }

        return view('petugas.excel_worksheet.'.strtolower($alkesOrder->alkes->excel_name),[
            'alkesOrder' => $alkesOrder,
            'title' => 'Lembar Kerja '. $alkesOrder->alkes->excel_name,
            'menu' => 'external',
            'certificate_number' => $certificate_number
        ]);
    }
}
