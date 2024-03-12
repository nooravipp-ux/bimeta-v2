<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class FinishGoodsController extends Controller
{
    public function index(){
        $data = DB::table('transaction.t_stock_finish_goods AS fg')
                ->join('master.m_goods AS goods', 'goods.id', '=', 'fg.goods_id')
                ->select([
                    'goods.name',
                    'fg.source_from',
                    DB::raw("CASE
                        WHEN goods.type = '1' THEN 'A'
                        WHEN goods.type = '2' THEN 'B'
                        WHEN goods.type = '3' THEN 'AB'
                        ELSE 'BB'
                    END AS goods_type_name"),
                    'fg.quantity',
                    'fg.created_at',
                    DB::raw("CASE
                        WHEN goods.type = '1' THEN CONCAT(goods.ply_type, ' ', goods.flute_type, '/F ', goods.substance)
                        WHEN goods.type = '2' THEN CONCAT(goods.ply_type, ' ', goods.flute_type, '/F ', goods.substance)
                        WHEN goods.type = '3' THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, '/F ', goods.bottom_substance, ' | ', goods.top_ply_type, ' ', goods.top_flute_type, '/F ', goods.top_substance)
                        ELSE CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, '/F ', goods.bottom_substance, ' | ', goods.top_ply_type, ' ', goods.top_flute_type, '/F ', goods.top_substance)
                    END AS specification"),
                    DB::raw("CASE
                        WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit)
                        WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit)
                        WHEN goods.type = '3' THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' | ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit)
                        ELSE CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' | ', goods.top_length, ' X ', goods.top_width, ' X ', goods.top_height, ' ', goods.top_meas_unit)
                    END AS measure"),
                ])
                ->paginate(20);

        return view('transaction.warehouse.finish-goods.index', compact('data'));
    }
}
