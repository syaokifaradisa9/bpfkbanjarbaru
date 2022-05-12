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
}
