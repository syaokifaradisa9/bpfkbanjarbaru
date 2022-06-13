<?php

namespace App\Http\Controllers\petugas;

use App\Models\Alkes;
use Illuminate\Http\Request;
use App\Helpers\FormatHelper;
use App\Models\AlkesCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ExternalAlkesOrder;
use App\Http\Controllers\Controller;
use App\Models\AlkesOrderDescription;
use App\Models\ExternalOrder;
use App\Models\ExternalOrderExcelValue;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class ExternalWorksheetController extends Controller
{
    public function index($order_id){
        $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order')
                            ->where('external_order_id', $order_id)->orderBy('alkes_id')->get();
                           
        return view('petugas.order.external.worksheet', [
            'title' => 'Lembar Kerja Pengujian dan Kalibrasi',
            'menu' => 'external',
            'alkes_orders' => $alkesOrder,
            'order_id' => $order_id,
            'order_status' => $alkesOrder[0]->external_order->status
        ]);
    }   

    public function excelWorksheet($order_id, $alkes_order_id){
        $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order')->findOrFail($alkes_order_id);
        
        // Mengambil Data Petugas
        $officers = [];
        foreach($alkesOrder->external_order->external_officer_order as $officer){
            array_push($officers, $officer->admin_user->name);
        }

        // Perhitungan Nomor Sertifikat Otomatis
        $orderByAlkes = ExternalAlkesOrder::where('external_order_id', $order_id)
                            ->where('alkes_id', $alkesOrder->alkes->id)->get();

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
            'title' => 'Lembar Kerja '. $alkesOrder->alkes->excel_name,
            'menu' => 'external',
            'certificate_number' => $certificate_number,
            'measuringInstruments' => $measuringInstruments,
            'order_id' => $order_id,
            'officers' => $officers
        ]);
    }

    public function store(Request $request, $orderId, $alkesOrderId){
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
            ExternalOrderExcelValue::create([
                'external_alkes_order_id' => $alkesOrderId,
                'cell' => $key,
                'value' => $value
            ]);
        }

        $order = ExternalOrder::findOrFail($orderId);
        if($order->status == "DISETUJUI"){
            $order->status = 'PENGERJAAN';
            $order->save();
        }

        return redirect(route('petugas.order.external.worksheet.index',[
            'order_id' => $orderId
        ]))->with('success','Berhasil Menyimpan Data');
    }

    public function insert($order_id){
        $category = AlkesCategory::all();
        return view('petugas.order.external.insert',[
            'title' => 'Lembar Kerja Pengujian dan Kalibrasi',
            'menu' => 'external',
            'categories' => $category,
            'order_id' => $order_id
        ]);
    }

    public function appendAlkes(Request $request, $order_id){
        for($i = 0; $i < count($request->alkes); $i++){
            $description_id = 1;
            if($request->description[$i] != null){
                $description_id = AlkesOrderDescription::create(['description' => $request->description[$i]]);
            }

            for($j = 0; $j < $request->ammount[$i]; $j++){
                ExternalAlkesOrder::create([
                    'alkes_id' => $request->alkes[$i],
                    'alkes_order_description_id' => $description_id,
                    'external_order_id' => $order_id,
                ]);
            }
        }

        return redirect(route('petugas.order.external.worksheet.index',[
            'order_id' => $order_id
            ]))->with('success','Berhasil Menambahkan Alat Kesehatan');
    }

    public function finishing($order_id){
        $order = ExternalOrder::findOrFail($order_id);
        $order->status = 'MENUNGGU PEMBAYARAN';
        $order->finishing_date = now();
        $order->save();

        return redirect(route('petugas.order.external.worksheet.index',[
            'order_id' => $order_id
        ]))->with('success','Berhasil Mengonfirmasi Order Menjadi Selesai');
    }

    public function edit($order_id, $alkes_order_id){
        $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order', 'external_order_excel_value')->findOrFail($alkes_order_id);
        
        // Mengambil Data Petugas
        $officers = [];
        foreach($alkesOrder->external_order->external_officer_order as $officer){
            array_push($officers, $officer->admin_user->name);
        }

        // Perhitungan Nomor Sertifikat Otomatis
        $orderByAlkes = ExternalAlkesOrder::where('external_order_id', $order_id)
                            ->where('alkes_id', $alkesOrder->alkes->id)->get();

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

        $excel_values = [];
        foreach($alkesOrder->external_order_excel_value as $data){
            $excel_values[$data->cell] = $data->value;
        }
        
        $certificate_month = explode(' - ', trim(explode('/', $excel_values['I2'])[1]));
        $certificate_month = $certificate_month[1]."-".FormatHelper::toNumberFromRomanFormat($certificate_month[0]);

        return view('petugas.excel_worksheet.'.strtolower($alkesOrder->alkes->excel_name),[
            'alkesOrder' => $alkesOrder,
            'excel_value' => $excel_values,
            'title' => 'Lembar Kerja '. $alkesOrder->alkes->excel_name,
            'menu' => 'external',
            'certificate_number' => trim(explode('/', $excel_values['I2'])[0]),
            'certificate_month' => $certificate_month,
            'measuringInstruments' => $measuringInstruments,
            'order_id' => $order_id,
            'officers' => $officers,
        ]);
    }

    public function update(Request $request, $order_id, $alkes_order_id){
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
            $excel_value = ExternalOrderExcelValue::where('external_alkes_order_id', $alkes_order_id)
                                                  ->where('cell', $cell)
                                                  ->get()->first();

            $excel_value->value = $value;
            $excel_value->save();
        }

        return redirect(route('petugas.order.external.worksheet.index', [
            'order_id' => $order_id
        ]))->with('success','Berhasil Mengubah Hasil Kalibrasi');
    }

    public function result($order_id, $alkes_order_id){
        $order = ExternalAlkesOrder::with('alkes', 'external_order_excel_value')->findOrFail($alkes_order_id);

        $excel = (new Xlsx())->load(public_path("alkes_excel_file\\" . $order->alkes->excel_name. '.xlsx'));
        $sheet = $excel->getSheetByName('ID');
  
        $input = $order->external_order_excel_value;
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
        $alkesOrder = ExternalAlkesOrder::with('alkes', 'external_order_excel_value')->findOrFail($alkes_order_id);

        $excel = (new Xlsx())->load(public_path("alkes_excel_file\\" . $alkesOrder->alkes->excel_name. '.xlsx'));
        $sheet = $excel->getSheetByName('ID');

        $input = $alkesOrder->external_order_excel_value;
        foreach($input as $value){
            $sheet->getCell($value->cell)->setValue($value->value);
        }

        $data = [
            'fasyenkes' => $alkesOrder->external_order->user->fasyenkes_name,
            'fasyenkes_type' => $alkesOrder->external_order->user->type,
            'fasyenkes_address' => $alkesOrder->external_order->user->address,
        ];

        $result = $excel->getSheetByName('SERTIFIKAT');
        $pdf = Pdf::loadView('petugas.certificate.certificate',[
            'general' => $data,
            'excel' => $result
        ])->setPaper('a4','portrait');
    
        return $pdf->stream('Sertifikat Kalibrasi '.$alkesOrder->alkes->name);
    }
}
