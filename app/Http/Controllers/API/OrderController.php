<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ExternalOrder;
use Exception;
use Illuminate\Http\Request;

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
}
