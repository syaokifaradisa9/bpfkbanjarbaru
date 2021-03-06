<?php

namespace App\Http\Controllers\fasyankes;

use App\Models\ExternalOrder;
use App\Models\InternalOrder;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\ExternalAlkesOrder;
use App\Models\InternalAlkesOrder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Illuminate\Support\Facades\Route;

class CertificateController extends Controller
{
    public function index($id){
        $orderType = explode('.', Route::current()->getName())[2];
        if($orderType == "insitu"){
            $alkesOrders = ExternalAlkesOrder::with('alkes')->where('external_order_id', $id)->get();
        }else{
            $alkesOrders = InternalAlkesOrder::with('alkes')->where('internal_order_id', $id)->get();
        }

        $alkesOrders = $alkesOrders->filter(function($item){
            return $item->status == 1;
        });

        $alkesOrders = $alkesOrders->values();
        return view('fasyankes.order.certificate.index',[
            'title' => 'Halaman Lampiran Order',
            'menu' => $orderType,
            'orders' => $alkesOrders,
            'order_id' => $id,
            'order_type' => $orderType
        ]);
    }

    public function printSertificate($order_id, $alkesOrderId){
        $orderType = explode('.', Route::current()->getName())[2];
        if($orderType == "insitu"){
            $order = ExternalOrder::with('user')->findOrFail($order_id);
            if($order->status != "SELESAI"){
                return redirect(route('fasyankes.order.'.$orderType.'.certificates.index', ['id' => $order])); 
            }
        }else{
            $order = InternalOrder::with('user')->findOrFail($order_id);
            if($order->status != "ALAT DAN SERTIFIKAT TELAH DISERAHKAN" && $order->status != "PEMBAYARAN LUNAS" && $order->status != "MENUNGGU PEMBAYARAN"){
                return redirect(route('fasyankes.order.'.$orderType.'.certificates.index', ['id' => $order])); 
            }
        }

        // Validasi Jika Ada Fasyankes Lain yang Mengakses
        if($order->user->id != Auth::guard('web')->user()->id){
            return redirect(route('fasyankes.order.'.$orderType.'.certificates.index', ['id' => $order])); 
        }

        // [1] Pengambilan Data Excel dari Database
        if($orderType == "insitu"){
            $alkes_order = ExternalAlkesOrder::with('external_order_excel_value','alkes')
                                            ->where('id', $alkesOrderId)
                                            ->get()
                                            ->first();
            $input = $alkes_order->external_order_excel_value;
        }else{
            $alkes_order = InternalAlkesOrder::with('internal_order_excel_value','alkes')
                                            ->where('id', $alkesOrderId)
                                            ->get()
                                            ->first();
            $input = $alkes_order->internal_order_excel_value;
        }

        // [2] Pengambilan Excel yang sesuai
        $excel = (new Xlsx())->load(public_path("alkes_excel_file\\" . $alkes_order->alkes->excel_name. '.xlsx'));
        
        // [3] Melakukan Input ke Excel
        $sheet = $excel->getSheetByName('ID');
        foreach($input as $value){
            $sheet->getCell($value->cell)->setValue($value->value);
        }

        // [4] Inisialisasi Untuk Melakukan Penggabungan PDF
        $oMerger = PDFMerger::init();

        // [5] Pembuatan Sertifikat
        $certificateFilePath = 'temp_files/'.$order->id. $alkesOrderId.'_certificate.pdf';

        file_put_contents(
            $certificateFilePath,
            Pdf::loadView('petugas.certificate.certificate', [
                'excel' => $excel->getSheetByName('SERTIFIKAT'),
                'general' => [
                    'fasyankes' => $order->user->fasyankes_name,
                    'fasyankes_type' => $order->user->type,
                    'fasyankes_address' => $order->user->address,
                ]
            ])->setPaper('a4','portrait')->output()
        );

        // [6] Pembuatan Laporan Hasil
        $resultFilePath = 'temp_files/'.$order->id. $alkesOrderId.'result.pdf';
        file_put_contents(
            $resultFilePath,
            Pdf::loadView('petugas.excel_report.'. $alkes_order->alkes->excel_name,[
                'data' => $excel->getSheetByName('LH'),
            ])->setPaper('a4','portrait')->output()
        );

        // [7] Menggabungkan Sertifikat dan Hasil
        $oMerger->addPDF(public_path($certificateFilePath));
        $oMerger->addPDF(public_path($resultFilePath));
        $oMerger->merge();

        // [8] Menghapus File yang ada di asset local
        unlink(public_path($certificateFilePath));
        unlink(public_path($resultFilePath));

        // [9] Menampilkan Sertifikat Hasil Kalibrasi
        $oMerger->setFileName($order->number . ' - Sertifikat dan Hasil ' . $alkes_order->alkes->name. '.pdf');
        return $oMerger->stream();
    }
}
