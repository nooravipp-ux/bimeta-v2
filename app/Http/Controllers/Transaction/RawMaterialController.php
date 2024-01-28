<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class RawMaterialController extends Controller
{
    public function index() {
        $data = DB::table('transaction.t_stock_raw_material as raw_material')
                ->join('master.m_material as material', 'material.id', '=', 'raw_material.material_id')
                ->paginate(20);
        return view('transaction.warehouse.raw-material.index', compact('data'));
    }
}
