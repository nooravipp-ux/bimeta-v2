<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class GoodsReceiveController extends Controller
{
    public function index() {
        $purchase = DB::table('transaction.t_purchase as purchase')
                    ->select('purchase.*', 'supplier.name')
                    ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                    ->get();

        $data = DB::table('transaction.t_goods_receive as goods_receive')
                        ->select('goods_receive.*', 'supplier.name', 'purchase.po_no',)
                        ->join('transaction.t_purchase as purchase', 'purchase.id', '=', 'goods_receive.purchase_id')
                        ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                        ->paginate(20);
        return view('transaction.procurement.goods-receive.index', compact('purchase', 'data'));
    }

    public function save(Request $request) {
        $goods_receive = DB::table('transaction.t_goods_receive')->insertGetId([
            "purchase_id" => $request->purchase_id,
            "gr_no" => $request->gr_no,
            "date" => $request->date,
            "receiver" => $request->receiver,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('procurement.goods-receive.edit', ['id' => $goods_receive]);
    }

    public function edit($id) {
        $goodsReceive = DB::table('transaction.t_goods_receive as goods_receive')
                        ->select('goods_receive.id','purchase.id as purchase_ids','purchase.po_no', 'supplier.name', 'goods_receive.gr_no', 'goods_receive.date', 'goods_receive.receiver')
                        ->join('transaction.t_purchase as purchase', 'purchase.id', '=', 'goods_receive.purchase_id')
                        ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                        ->where('goods_receive.id', $id)
                        ->first();
        
        $materials = DB::table('transaction.t_detail_purchase as detail_purchase')
                    ->select('detail_purchase.id',
                             'material.name', 
                             'detail_purchase.width', 
                             'detail_purchase.quantity'
                            //  DB::raw('CASE
                            //         WHEN detail_goods_receive.quantity IS NULL THEN detail_purchase.quantity
                            //         ELSE (detail_purchase.quantity - detail_goods_receive.quantity)
                            //     END AS quantity')
                    )
                    ->leftJoin('transaction.t_detail_goods_receive as detail_goods_receive', 'detail_goods_receive.detail_purchase_id', '=', 'detail_purchase.id')
                    ->join('master.m_material as material', 'material.id', '=', 'detail_purchase.material_id')
                    ->where('detail_purchase.purchase_id', $goodsReceive->purchase_ids)
                    ->get();

        $detail = DB::table('transaction.t_detail_goods_receive as detail_goods_receive')
                ->select('detail_goods_receive.*', 'detail_purchase.width', 'detail_purchase.measure_unit', 'material.name', 'material.gramature', 'material.unit')
                ->join('transaction.t_detail_purchase as detail_purchase', 'detail_purchase.id', '=', 'detail_goods_receive.detail_purchase_id')
                ->join('master.m_material as material', 'material.id', '=', 'detail_purchase.material_id')
                ->where('detail_goods_receive.goods_receive_id', $goodsReceive->id)
                ->get();
        
        return view('transaction.procurement.goods-receive.edit', compact('goodsReceive', 'materials', 'detail'));
    }

    public function saveDetail(Request $request) {

        DB::table('transaction.t_detail_goods_receive')->insert([
            "goods_receive_id" => $request->goods_receive_id,
            "detail_purchase_id" => $request->detail_purchase_id,
            "diameter" => $request->diameter,
            "no_roll" => $request->no_roll,
            "weight" => $request->weight,
            "remarks" => $request->remarks,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        $detail_purchase = DB::table('transaction.t_detail_purchase')->where('id', $request->detail_purchase_id)->first();

        DB::table('transaction.t_stock_raw_material')->insert([
            "material_id" => $detail_purchase->material_id,
            "width" => $detail_purchase->width,
            "no_roll" => $request->no_roll,
            "weight" => $request->weight,
            "source_from" => "",
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function deleteDetail($id){
        DB::table('transaction.t_detail_goods_receive')->where('id', $id)->delete();
        return redirect()->back();
    }
}
