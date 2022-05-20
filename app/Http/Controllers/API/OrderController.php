<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\ExternalOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Mail\ExternalOfferingLetterMail;
use Illuminate\Support\Facades\Mail;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class OrderController extends Controller
{
    public function updateExternalOrderNumber(Request $request, $id){
        if($request->api_key == "bQ2FxXLfw8RjH1rsrLcBkEzZKY3FVRlICDX4AziUcFESyiVKzCRM2rVpg8yAhk"){
            try{
                $order = ExternalOrder::findOrFail($id);
                $order->number = $request->order_number;
                $order->status = 'DITERIMA';
                $order->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil Menerima Order Fasyenkes'
                ]);
            }catch(Exception $error){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal Menerima Order Fasyenkes, Silahkan Coba Lagi!'
                ]);
            }
        }
        
        return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
    }

    public function updateAccomodationExternalOrder(Request $request, $id){
        if($request->api_key == "KWEPIs9i3CuF7tZF8xFQGRzNrmkuOlcQ5TmRf4Ikoe9POuAUQsB5ujZGMu7Ks7YG"){
            try{
                $order = ExternalOrder::findOrFail($id);
                $order->accommodation = $request->accommodation;
                $order->status = 'MENUNGGU PERSETUJUAN';
                $order->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil Menetapkan Akomodasi Pada Order Fasyenkes'
                ]);
            }catch(Exception $error){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal Menetapkan Akomodasi Pada Order Fasyenkes, Silahkan Coba Lagi!'
                ]);
            }
        }

        return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
    }

    public function updateOutLetterNumberExternalOrder(Request $request, $id){
        if($request->api_key != "vohtTCCa8FboaF3hA15UiR0AVQ1tqlErYHhEgO4kXnPeTxBJKRDPrYRVLVgbXTdf"){
            return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
        }

        try{
            $order = ExternalOrder::findOrFail($id);
            $order->out_letter_number = $request->out_letter_number;
            $order->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil Menetapkan Nomor Surat Keluar Pada Order Fasyenkes'
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Menetapkan Akomodasi Pada Order Fasyenkes, Silahkan Coba Lagi!'
            ]);
        }
    }

    public function sendOfferingLetterToFasyenkes(Request $request, $id){
        if($request->api_key != "YIYCm4oo91XxvLG1gIUVKRyprHIF78Dz40IaB0DFodsz171MNqidSDtcflzfkK9N"){
            return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
        }

        try{
            $order = ExternalOrder::with('user')->findOrFail($id);

            $dataList = [
                ['template_name' => 'offering_letter'],
                ['template_name' => 'review_demand_letter'],
                ['template_name' => 'accommodation_letter']
            ];

            $oMerger = PDFMerger::init();
            foreach($dataList as $index => $data){
                $filePath = 'temp_files/'.$order->id. $index.'.pdf';
                file_put_contents(
                    $filePath,
                    Pdf::loadView('report.'.$data['template_name'], [
                        'order' => $order
                    ])->output()
                );
                $oMerger->addPDF(public_path($filePath));
            }

            $oMerger->merge();

            foreach($dataList as $index => $data){
                $filePath = 'temp_files/'.$order->id. $index.'.pdf';
                unlink(public_path($filePath));
            }

            $oMerger->setFileName('Surat Penawaran.pdf');     
            $oMerger->save(public_path('temp_files/'.$order->id.$order->user->id.'.pdf'));
            
            Mail::to($order->user->email)->send(new ExternalOfferingLetterMail($order));

            $order->status = 'MENUNGGU PERSETUJUAN';
            $order->save();

            unlink(public_path('temp_files/'.$order->id.$order->user->id.'.pdf'));
            return response()->json([
                'status' => 'success',
                'message' => 'Sukses Mengirimkan Surat Penawaran Ke Fasyenkes, Silahkan Tunggu Sampai Pihak Fasyenkes Menyetujui Penawaran!'
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Mengirimkan Surat Penawaran Ke Fasyenkes, Silahkan Coba Lagi!'
            ]);
        }
    }  

    public function updateStatusToAccepted(Request $request, $id){
        if($request->api_key != "5IF7F16s9XRzvBH94LG9GqQIUYhMp5PJEBfdyCjWCjklcpveXNGmZbbSAqkjWqQF"){
            return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
        }

        try{
            $order = ExternalOrder::findOrFail($id);
            $order->status = 'DISETUJUI';
            $order->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Sukses Mengonfirmasi Order, Tunggu Penyelia Memilih Petugas yang Akan Berangkat!'
            ]);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Mengonfirmasi Order, Silahkan Coba Lagi!'
            ]);
        }
    }
}
