<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class DeliveryController extends Controller
{
    public function index() {
        $data = DB::table('transaction.t_delivery_order AS delivery_order')
                ->select('delivery_order.id','delivery_order.travel_permit_no', 'customer.name AS customer_name', 'sales_order.transaction_no', 'sales_order.ref_po_customer', 'delivery_order.delivery_date AS actual_delivery_date')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->get();
        // dd($data);
        return view('transaction.warehouse.delivery.index', compact('data'));
    }

    public function create() {
        $salesOrders = DB::table('transaction.t_sales_order')->get();
        return view('transaction.warehouse.delivery.create', compact('salesOrders'));
    }

    public function save(Request $request) {

        $tax_type = DB::table('transaction.t_sales_order')->where('id', $request->sales_order_id)->first();

        $deliveryOrder = DB::table('transaction.t_delivery_order')->insertGetId([
            "sales_order_id" => $request->sales_order_id,
            "travel_permit_no" => DB::select("SELECT transaction.generate_travel_permit_number('$tax_type->tax_type') as travel_permit_no")[0]->travel_permit_no,
            "delivery_date" => $request->delivery_date,
            "licence_plate" => $request->licence_plate,
            "driver_name" => $request->driver_name,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return redirect()->route('warehouse.delivery.edit', ['id' => $deliveryOrder]);
    }

    public function edit($id) {
        $deliveryOrder = DB::table('transaction.t_delivery_order AS delivery_order')
                    ->select('sales_order.id AS sales_order_id','delivery_order.id','delivery_order.travel_permit_no', 'customer.name AS customer_name', 'customer.address', 'customer.phone_number', 'sales_order.transaction_no', 'sales_order.ref_po_customer', 'sales_order.tax_type', 'delivery_order.delivery_date AS actual_delivery_date', 'delivery_order.licence_plate', 'delivery_order.driver_name')
                    ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                    ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                    ->where('delivery_order.id', $id)
                    ->first();

        $goodsList = DB::select("SELECT
                            goods.id,
                            stock_finish_goods.source_from AS spk_no,
                            goods.name as goods_name,
                            CASE
                                WHEN goods.type = '1' THEN 'SHEET' 
                                WHEN goods.type = '2' THEN 'BOX' 
                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                ELSE 'BADAN TUTUP (BB)' 
                            END AS goods_type_name,
                            CASE
                                WHEN goods.type = '1' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '2' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '3' THEN CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                                ELSE CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                            END AS specification,
                            CASE
                                WHEN goods.type = '1' THEN CONCAT ( goods.length, ' X ', goods.width, ' ', goods.meas_unit) 
                                WHEN goods.type = '2' THEN CONCAT ( goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')') 
                                WHEN goods.type = '3' THEN CONCAT ( goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit) 
                                ELSE CONCAT ( goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' X ', goods.top_height, ' ', goods.top_meas_unit) 
                            END AS measure,
                            stock_finish_goods.quantity 
                            FROM transaction.t_stock_finish_goods AS stock_finish_goods
                            JOIN master.m_goods AS goods ON goods.id = stock_finish_goods.goods_id;");

        $detailDeliveryOrder = DB::select("SELECT
                                        detail_delivery_order.id,
                                        goods.name as goods_name,
                                        CASE
                                            WHEN goods.type = '1' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                            WHEN goods.type = '2' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                            WHEN goods.type = '3' THEN CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                                            ELSE CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                                        END AS specification,
                                        CASE
                                            WHEN goods.type = '1' THEN CONCAT ( goods.length, ' X ', goods.width, ' ', goods.meas_unit) 
                                            WHEN goods.type = '2' THEN CONCAT ( goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')') 
                                            WHEN goods.type = '3' THEN CONCAT ( goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit) 
                                            ELSE CONCAT ( goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' X ', goods.top_height, ' ', goods.top_meas_unit) 
                                        END AS measure,
                                            detail_delivery_order.quantity,
                                            detail_delivery_order.remarks
                                    FROM
                                        TRANSACTION.t_detail_delivery_order detail_delivery_order
                                        JOIN TRANSACTION.t_delivery_order delivery_order ON delivery_order.ID = detail_delivery_order.delivery_order_id
                                        JOIN TRANSACTION.t_spk spk ON spk.ID = detail_delivery_order.spk_id
                                        JOIN TRANSACTION.t_detail_sales_order detail_sales_order ON detail_sales_order.ID = spk.detail_sales_order_id
                                        JOIN master.m_goods AS goods ON goods.id = detail_sales_order.goods_id
                                        WHERE detail_delivery_order.delivery_order_id = $id;");

        return view('transaction.warehouse.delivery.edit', compact('deliveryOrder', 'goodsList', 'detailDeliveryOrder'));
    }

    public function saveDetail(Request $request) {

        DB::table('transaction.t_detail_delivery_order')->insert([
            "delivery_order_id" => $request->delivery_order_id,
            "goods_id" => $request->spk_id,
            "quantity" => $request->quantity,
            "remarks" => $request->remarks,
            "created_at"=> date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]); 

        return redirect()->route('warehouse.delivery.edit', ['id' => $request->delivery_order_id]);
    }

    public function deleteDetail($id){
        DB::table('transaction.t_detail_delivery_order')->where('id', $id)->delete();

        return redirect()->back();
    }
}
