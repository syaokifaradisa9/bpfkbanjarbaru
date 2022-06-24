<?php

namespace App\Http\Controllers\petugas;

use App\Models\Alkes;
use Illuminate\Http\Request;
use App\Helpers\FormatHelper;
use App\Models\AlkesCategory;
use App\Models\ExternalOrder;
use App\Models\ExternalAlkesOrder;
use App\Models\InternalAlkesOrder;
use App\Http\Controllers\Controller;
use App\Models\AlkesOrderDescription;
use Illuminate\Support\Facades\Route;
use App\Models\ExternalOrderExcelValue;
use App\Models\InternalOrder;
use App\Models\InternalOrderExcelValue;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Barryvdh\DomPDF\Facade\Pdf;

class WorksheetController extends Controller
{
    public function index($order_id){
        $orderType = explode('.', Route::current()->getName())[2];

        if($orderType == "external"){
            $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order')
                                            ->where('external_order_id', $order_id)
                                            ->orderBy('alkes_id')
                                            ->get();

            $status = $alkesOrder[0]->external_order->status;
        }else{
            $alkesOrder = InternalAlkesOrder::with('alkes', 'internal_order')
                                            ->join('alkes', 'internal_alkes_orders.alkes_id', '=', 'alkes.id')
                                            ->where('internal_order_id', $order_id)
                                            ->orderBy('alkes.name')
                                            ->get(['internal_alkes_orders.*', 'alkes.name']);

            $status = $alkesOrder[0]->internal_order->status;
        }
        
        return view('petugas.order.worksheet.index', [
            'title' => 'Lembar Kerja Pengujian dan Kalibrasi',
            'menu' => $orderType == 'external' ? 'external' : 'worksheet',
            'alkes_orders' => $alkesOrder,
            'order_id' => $order_id,
            'order_status' => $status,
            'order_type' => $orderType
        ]);
    } 

    public function excelWorksheet($order_id, $alkes_order_id){
        $orderType = explode('.', Route::current()->getName())[2];
        $officers = [];
        $orderByAlkes = [];

        if($orderType == "external"){
            $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order')->findOrFail($alkes_order_id);

            // Pengambilan Petugas Sesuai Order
            foreach($alkesOrder->external_order->external_officer_order as $officer){
                array_push($officers, $officer->admin_user->name);
            }

            // Perhitungan Nomor Sertifikat otomatis
            $orderByAlkes = ExternalAlkesOrder::where('external_order_id', $order_id)
                                                ->where('alkes_id', $alkesOrder->alkes->id)
                                                ->get();
        }else{
            $alkesOrder = InternalAlkesOrder::with('alkes', 'internal_order')->findOrFail($alkes_order_id);

            // Pengambilan Petugas Sesuai Order
            foreach($alkesOrder->internal_order->internal_officer_order as $officer){
                array_push($officers, $officer->admin_user->name);
            }

            
            // Perhitungan Nomor Sertifikat otomatis
            $orderByAlkes = InternalAlkesOrder::where('internal_order_id', $order_id)
                                                ->where('alkes_id', $alkesOrder->alkes->id)
                                                ->get();
        }

        $certificate_number = 1;
        foreach($orderByAlkes as $data){
            if($data->status == 1){
                $certificate_number++;
            }
        }

        // Pengambilan Data Alat Ukur Kalibrasi
        $alkes = Alkes::with('instrument_alkes_group')->findOrFail($alkesOrder->alkes->id);
        $measuringInstruments = [];
        foreach($alkes->instrument_alkes_group as $alkesGroup){
            $instrumentGroup = $alkesGroup->instrument_group;

            $measuringInstrument = [
                'id' => $instrumentGroup->id,
                'name' => explode('-', $instrumentGroup->name)[0],
                'instruments' => []
            ];
            
            foreach($instrumentGroup->instrument_group_relation as $instrumentrelation){
                $measuring_instrument = $instrumentrelation->measuring_instrument;
                
                array_push(
                    $measuringInstrument['instruments'],
                    $measuring_instrument->name.', Merek : '
                        .$measuring_instrument->merk.', Model : '
                        .$measuring_instrument->model.', SN : '
                        .$measuring_instrument->serial_number
                );
            }

            // sort($measuringInstrument['instruments']);
            array_push($measuringInstruments, $measuringInstrument);
        }

        return view('petugas.excel_worksheet.'.strtolower($alkesOrder->alkes->excel_name),[
            'alkesOrder' => $alkesOrder,
            'title' => 'Lembar Kerja '. $alkesOrder->alkes->name,
            'menu' => $orderType == 'external' ? 'external' : 'worksheet',
            'certificate_number' => $certificate_number,
            'measuringInstruments' => $measuringInstruments,
            'order_id' => $order_id,
            'officers' => $officers,
            'order_type' => $orderType
        ]);
    }

    public function store(Request $request, $orderId, $alkesOrderId){
        $orderType = explode('.', Route::current()->getName())[2];

        $certificate_number = $request->certificate_number.' / ';
        $certificate_number = $certificate_number.FormatHelper::toRomanMonthNumber(explode('-', $request->certificate_date)[1]).' - ';
        $certificate_number = $certificate_number.explode('-', $request->certificate_date)[0].' / ';
        $certificate_number = $certificate_number.$request->order_number;

        $input = $request->all();

        unset($input['_token']);
        unset($input['certificate_date']);
        unset($input['certificate_number']);
        unset($input['order_number']);
        
        $input['I2'] = $certificate_number;
        foreach($input as $key => $value){
            if($orderType == "external"){
                ExternalOrderExcelValue::create([
                    'external_alkes_order_id' => $alkesOrderId,
                    'cell' => $key,
                    'value' => $value
                ]);
            }else{
                InternalOrderExcelValue::create([
                    'internal_alkes_order_id' => $alkesOrderId,
                    'cell' => $key,
                    'value' => $value
                ]);
            }
        }

        if($orderType == "external"){
            $order = ExternalOrder::findOrFail($orderId);
        }else{
            $order = InternalOrder::findOrFail($orderId);
        }
        
        if($order->status == "DISETUJUI"){
            $order->status = 'PENGERJAAN';
            $order->save();
        }

        return redirect(route('petugas.order.'.$orderType.'.worksheet.index', [
            'order_id' => $orderId
        ]))->with('success','Berhasil Menyimpan Data');
    }

    public function insert($order_id){
        $orderType = explode('.', Route::current()->getName())[2];

        $category = AlkesCategory::all();
        return view('petugas.order.worksheet.alkes-insert',[
            'title' => 'Lembar Kerja Pengujian dan Kalibrasi',
            'menu' => $orderType == 'external' ? 'external' : 'worksheet',
            'categories' => $category,
            'order_id' => $order_id,
            'order_type' => $orderType
        ]);
    }

    public function appendAlkes(Request $request, $order_id){
        $orderType = explode('.', Route::current()->getName())[2];

        for($i = 0; $i < count($request->alkes); $i++){
            $description_id = 1;
            if($request->description[$i] != null){
                $description_id = AlkesOrderDescription::create(['description' => $request->description[$i]]);
            }

            for($j = 0; $j < $request->ammount[$i]; $j++){
                if($orderType == "external"){
                    ExternalAlkesOrder::create([
                        'alkes_id' => $request->alkes[$i],
                        'alkes_order_description_id' => $description_id,
                        'external_order_id' => $order_id,
                    ]);
                }else{
                    InternalAlkesOrder::create([
                        'alkes_id' => $request->alkes[$i],
                        'alkes_order_description_id' => $description_id,
                        'internal_order_id' => $order_id,
                    ]);
                }
            }
        }

        return redirect(route('petugas.order.'.$orderType.'.worksheet.alkes-order',[
            'order_id' => $order_id
        ]))->with('success','Berhasil Menambahkan Alat Kesehatan');
    }

    public function edit($order_id, $alkes_order_id){
        $orderType = explode('.', Route::current()->getName())[2];
        if($orderType == 'external'){
            $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order', 'external_order_excel_value')->findOrFail($alkes_order_id);
            $orderOfficer = $alkesOrder->external_order->external_officer_order;

            // Pengambilan alkes order untuk keperluan perhitungan nomor sertifikat otomatis
            $orderByAlkes = ExternalAlkesOrder::where('external_order_id', $order_id)->where('alkes_id', $alkesOrder->alkes->id)->get();

            // Data Excel
            $excel_values = [];
            foreach($alkesOrder->external_order_excel_value as $data){
                $excel_values[$data->cell] = $data->value;
            }
        }else{
            $alkesOrder = InternalAlkesOrder::with('alkes', 'internal_order', 'internal_order_excel_value')->findOrFail($alkes_order_id);
            $orderOfficer = $alkesOrder->internal_order->internal_officer_order;

            // Pengambilan alkes order untuk keperluan perhitungan nomor sertifikat otomatis
            $orderByAlkes = ExternalAlkesOrder::where('external_order_id', $order_id)->where('alkes_id', $alkesOrder->alkes->id)->get();

            // Data Excel
            $excel_values = [];
            foreach($alkesOrder->internal_order_excel_value as $data){
                $excel_values[$data->cell] = $data->value;
            }
        }
        
        // Mengambil Data Petugas
        $officers = [];
        foreach($orderOfficer as $officer){
            array_push($officers, $officer->admin_user->name);
        }

        // Perhitungan Nomor Sertifikat Otomatis
        $certificate_number = 1;
        foreach($orderByAlkes as $data){
            if($data->status == 1){
                $certificate_number++;
            }
        }
        
        // Pengambilan Data Alat Ukur Kalibrasi
        $alkes = Alkes::with('instrument_alkes_group')->findOrFail($alkesOrder->alkes->id);
        $measuringInstruments = [];
        foreach($alkes->instrument_alkes_group as $alkesGroup){
            $instrumentGroup = $alkesGroup->instrument_group;

            $measuringInstrument = [
                'id' => $instrumentGroup->id,
                'name' => explode('-', $instrumentGroup->name)[0],
                'instruments' => []
            ];
            
            foreach($instrumentGroup->instrument_group_relation as $instrumentrelation){
                $measuring_instrument = $instrumentrelation->measuring_instrument;
                
                array_push(
                    $measuringInstrument['instruments'],
                    $measuring_instrument->name.', Merek : '
                        .$measuring_instrument->merk.', Model : '
                        .$measuring_instrument->model.', SN : '
                        .$measuring_instrument->serial_number
                );
            }

            // sort($measuringInstrument['instruments']);
            array_push($measuringInstruments, $measuringInstrument);
        }
        
        $certificate_month = explode(' - ', trim(explode('/', $excel_values['I2'])[1]));
        $certificate_month = '20'.$certificate_month[1]."-".FormatHelper::toNumberFromRomanFormat($certificate_month[0]);

        return view('petugas.excel_worksheet.'.strtolower($alkesOrder->alkes->excel_name),[
            'alkesOrder' => $alkesOrder,
            'excel_value' => $excel_values,
            'title' => 'Lembar Kerja '. $alkesOrder->alkes->excel_name,
            'menu' => $orderType == 'external' ? 'external' : 'worksheet',
            'certificate_number' => trim(explode('/', $excel_values['I2'])[0]),
            'certificate_month' => $certificate_month,
            'measuringInstruments' => $measuringInstruments,
            'order_id' => $order_id,
            'officers' => $officers,
            'order_type' => $orderType
        ]);
    }

    public function update(Request $request, $order_id, $alkes_order_id){
        $orderType = explode('.', Route::current()->getName())[2];

        $certificate_number = $request->certificate_number.' / ';
        $certificate_number = $certificate_number.FormatHelper::toRomanMonthNumber(explode('-', $request->certificate_date)[1]).' - ';
        $certificate_number = $certificate_number.explode('-', $request->certificate_date)[0].' / ';
        $certificate_number = $certificate_number.$request->order_number;

        $input = $request->all();

        unset($input['_token']);
        unset($input['_method']);
        unset($input['certificate_date']);
        unset($input['certificate_number']);
        unset($input['order_number']);
        
        $input['I2'] = $certificate_number;

        foreach($input as $cell => $value){
            if($orderType == 'external'){
                $excel_value = ExternalOrderExcelValue::where('external_alkes_order_id', $alkes_order_id)
                                                ->where('cell', $cell)
                                                ->get()->first();
            }else{
                $excel_value = InternalOrderExcelValue::where('internal_alkes_order_id', $alkes_order_id)
                                                ->where('cell', $cell)
                                                ->get()->first();
            }

            $excel_value->value = $value;
            $excel_value->save();
        }

        return redirect(route('petugas.order.'.$orderType.'.worksheet.index', [
            'order_id' => $order_id
        ]))->with('success','Berhasil Mengubah Hasil Kalibrasi');
    }

    public function finishing($order_id){
        $orderType = explode('.', Route::current()->getName())[2];

        if($orderType == 'external'){
            $order = ExternalOrder::findOrFail($order_id);
        }else{
            $order = InternalOrder::findOrFail($order_id);
        }
        
        $order->status = 'MENUNGGU PEMBAYARAN';
        $order->finishing_date = now();
        $order->save();

        return redirect(route('petugas.order.'.$orderType.'.worksheet.alkes-order',[
            'order_id' => $order_id
        ]))->with('success','Berhasil Mengonfirmasi Order Menjadi Selesai');
    }

    public function result($order_id, $alkes_order_id){
        $orderType = explode('.', Route::current()->getName())[2];

        if($orderType == 'external'){
            $order = ExternalAlkesOrder::with('alkes', 'external_order_excel_value')->findOrFail($alkes_order_id);
            $input = $order->external_order_excel_value;
        }else{
            $order = InternalAlkesOrder::with('alkes', 'internal_order_excel_value')->findOrFail($alkes_order_id);
            $input = $order->internal_order_excel_value;
        }

        $excel = (new Xlsx())->load(public_path("alkes_excel_file\\" . $order->alkes->excel_name. '.xlsx'));
        $sheet = $excel->getSheetByName('ID');
  
        foreach($input as $value){
            $sheet->getCell($value->cell)->setValue($value->value);
        }

        $result = $excel->getSheetByName('LH');
        // foreach(range('F','J') as $letter){
        //     print($letter."18"." = ".$result->getCell($letter.'18')->getFormattedValue()."\n");
        // }
        // for($i = 155; $i <=160; $i++){
        //     print("_____A".$i." = ". $result->getCell('A'.$i)->getFormattedValue());
        //     print("_____F".$i." = ". $result->getCell('F'.$i)->getFormattedValue());
        // }
        // dd($result->getCell('C164')->getFormattedValue());
            
        $pdf = Pdf::loadView('petugas.excel_report.'. $order->alkes->excel_name,['data' => $result]);
        return $pdf->stream('Hasil Kalibrasi '. $order->alkes->name .'.pdf');
    }

    public function certificate($order_id, $alkes_order_id){
        $orderType = explode('.', Route::current()->getName())[2];

        if($orderType == 'external'){
            $order = ExternalAlkesOrder::with('alkes', 'external_order_excel_value')->findOrFail($alkes_order_id);
            $input = $order->external_order_excel_value;
            $data = [
                'fasyankes' => $order->external_order->user->fasyankes_name,
                'fasyankes_type' => $order->external_order->user->type,
                'fasyankes_address' => $order->external_order->user->address,
            ];
        }else{
            $order = InternalAlkesOrder::with('alkes', 'internal_order_excel_value')->findOrFail($alkes_order_id);
            $input = $order->internal_order_excel_value;
            $data = [
                'fasyankes' => $order->internal_order->user->fasyankes_name,
                'fasyankes_type' => $order->internal_order->user->type,
                'fasyankes_address' => $order->internal_order->user->address,
            ];
        }

        $excel = (new Xlsx())->load(public_path("alkes_excel_file\\" . $order->alkes->excel_name. '.xlsx'));
        $sheet = $excel->getSheetByName('ID');

        foreach($input as $value){
            $sheet->getCell($value->cell)->setValue($value->value);
        }

        $result = $excel->getSheetByName('SERTIFIKAT');
        $pdf = Pdf::loadView('petugas.certificate.certificate',[
            'general' => $data,
            'excel' => $result
        ])->setPaper('a4','portrait');
    
        return $pdf->stream('Sertifikat Kalibrasi '.$order->alkes->name);
    }
}
