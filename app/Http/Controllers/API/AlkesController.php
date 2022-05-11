<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Alkes;
use Illuminate\Http\Request; 

class AlkesController extends Controller
{
    public function getAlkesByCategoryId(Request $request, $id){
        if($request->api_key == "MAq6gTq9gJacnrqJxmfBs1kZwC9VJDcwcHbI66ns687ZUqhcCfKWd76kyQTnZ7"){
            $alkes = Alkes::where('alkes_category_id', $id)->orderBy('name')->get();
            return response()->json($alkes);
        }
        
        return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
    }

    public function getPriceByAlkesId(Request $request, $id){
        if($request->api_key == "7ZwiJpZaHEmSy7OMAAxq0GPmXIp6iU5l1ERBVNgw59ofNxvhw8egjvrsK058JJ"){
            $price = Alkes::findOrFail($id)->price;
            return response()->json($price);
        }
        
        return response()->json(['message' => "Anda Tidak Memiliki Akses Pada Resource ini!"]);
    }
}
