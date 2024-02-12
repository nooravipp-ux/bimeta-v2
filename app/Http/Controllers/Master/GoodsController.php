<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class GoodsController extends Controller
{
    public function index() {
        $substances = DB::table('master.m_substance')->orderBy('id', 'ASC')->get();
        $data = DB::table('master.m_goods AS goods')
                ->select([
                    'goods.id',
                    'goods.name AS goods_name',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'SHEET'
                                WHEN goods.type = '2' THEN 'BOX'
                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)'
                                ELSE 'BADAN TUTUP (BB)'
                            END AS goods_type"),
                    DB::raw("CASE
                                WHEN goods.type = '1' OR goods.type = '2' THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance)
                                WHEN goods.type = '3' OR goods.type = '4' THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance)
                            END AS specification"),
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit)
                                WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')')
                                WHEN goods.type = '3' OR goods.type = '4' THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' X ', goods.top_height, ' ', goods.top_meas_unit)
                            END AS measure"),
                ])->orderBy('id', 'ASC')->paginate(10);

        return view('master.goods.index', compact('data', 'substances'));
    }

    public function create() {
        $substances = DB::table('master.m_substance')->orderBy('id', 'ASC')->get();
        return view('master.goods.create', compact('substances'));
    }

    public function save(Request $request) {
        if($request->goods_type == 1) {
            DB::table('master.m_goods')->insert([
                "name" => $request->name,
                "type" => $request->goods_type,
                "price" => $request->price,
                "ply_type" => $request->ply_type,
                "flute_type" => $request->flute_type,
                "substance" => $request->substance,
                "meas_unit" => $request->meas_unit,
                "meas_type" => $request->meas_type,
                "length" => $request->length,
                "width" => $request->width,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        } else if ($request->goods_type == 2) {
            DB::table('master.m_goods')->insert([
                "name" => $request->name,
                "type" => $request->goods_type,
                "price" => $request->price,
                "ply_type" => $request->ply_type,
                "flute_type" => $request->flute_type,
                "substance" => $request->substance,
                "meas_unit" => $request->meas_unit,
                "meas_type" => $request->meas_type,
                "length" => $request->length,
                "width" => $request->width,
                "height" => $request->height,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        } else {
            DB::table('master.m_goods')->insert([
                "name" => $request->name,
                "type" => $request->goods_type,
                "top_price" => $request->top_price,
                "top_ply_type" => $request->top_ply_type,
                "top_flute_type" => $request->top_flute_type,
                "top_substance" => $request->top_substance,
                "top_meas_unit" => $request->top_meas_unit,
                "top_length" => $request->top_length,
                "top_width" => $request->top_width,
                "top_height" => $request->top_width,
                "bottom_price" => $request->bottom_price,
                "bottom_ply_type" => $request->bottom_ply_type,
                "bottom_flute_type" => $request->bottom_flute_type,
                "bottom_substance" => $request->bottom_substance,
                "bottom_meas_unit" => $request->bottom_meas_unit,
                "bottom_length" => $request->bottom_length,
                "bottom_width" => $request->bottom_width,
                "bottom_height" => $request->bottom_width,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        return redirect()->route('goods.index');
    }

    public function edit($id) {
        $goods = DB::table('master.m_goods')->where('id', $id)->first();
        $substances = DB::table('master.m_substance')->orderBy('id', 'ASC')->get();
        return view('master.goods.edit', compact('goods', 'substances'));
    }

    public function update(Request $request) {

        if($request->type <= 2) {
            DB::table('master.m_goods')->where('id', $request->id)->update([
                "name" => $request->name,
                "type" => $request->goods_type,
                "price" => $request->price,
                "ply_type" => $request->ply_type,
                "flute_type" => $request->flute_type,
                "substance" => $request->substance,
                "meas_unit" => $request->meas_unit,
                "meas_type" => $request->meas_type,
                "length" => $request->length,
                "width" => $request->width,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => Auth::user()->name,
            ]);
        }

        if($request->type > 2) {
            DB::table('master.m_goods')->where('id', $request->id)->update([
                "name" => $request->name,
                "type" => $request->goods_type,
                "top_price" => $request->top_price,
                "top_ply_type" => $request->top_ply_type,
                "top_flute_type" => $request->top_flute_type,
                "top_substance" => $request->top_substance,
                "top_meas_unit" => $request->top_meas_unit,
                "top_length" => $request->top_length,
                "top_width" => $request->top_width,
                "top_height" => $request->top_width,
                "bottom_price" => $request->bottom_price,
                "bottom_ply_type" => $request->bottom_ply_type,
                "bottom_flute_type" => $request->bottom_flute_type,
                "bottom_substance" => $request->bottom_substance,
                "bottom_meas_unit" => $request->bottom_meas_unit,
                "bottom_length" => $request->bottom_length,
                "bottom_width" => $request->bottom_width,
                "bottom_height" => $request->bottom_width,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => Auth::user()->name,
            ]);
        }

        return redirect()->route('goods.index');
    }

    public function delete($id) {
        
    }
}
