<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class IndexPriceController extends Controller
{
    public function index() {
        $substances = DB::table('master.m_substance')->get();
        $data = DB::table('transaction.t_mapping_index_price as index_price')
                ->select('index_price.*', 'substance.substance')
                ->join('master.m_substance as substance', 'substance.id', '=', 'index_price.substance_id')
                ->get();

        return view('transaction.index-price.index', compact('data', 'substances'));
    }

    public function getIndexPrice($flute_type, $substance){
        $price = DB::table('transaction.t_mapping_index_price')->select('price')
                ->where('flute_type', $flute_type)
                ->where('substance_id', $substance)
                ->first();

        return response()->json($price);
    }

    public function save(Request $request){
        DB::table('transaction.t_mapping_index_price')
        ->insert([
            'ply_type' => $request->ply_type,
            'flute_type' => $request->flute_type,
            'substance_id' => $request->substance,
            'price' => $request->index_price,
            'tag' => $request->index_tag
        ]);        
        return redirect()->back();
    }

    public function getList() {
        return view('transaction.index-price.index');
    }
}
