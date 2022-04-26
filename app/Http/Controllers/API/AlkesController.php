<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alkes;
use Illuminate\Http\Request; 

class AlkesController extends Controller
{
    public function getAlkesByCategoryId(Request $request, $id){
        if($request->api_key == "bpfk_banj_alkes_select_service"){
            $alkes = Alkes::where('alkes_category_id', $id)->orderBy('name')->get();
            return response()->json($alkes);
        }
        
        return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
    }

    public function getPriceByAlkesId(Request $request, $id){
        if($request->api_key == "bpfk_banj_alkes_price_service"){
            $price = Alkes::findOrFail($id)->price;
            return response()->json($price);
        }
        
        return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
    }
}
