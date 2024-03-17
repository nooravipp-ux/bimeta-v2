<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class DeliveryController extends Controller
{
    public function index() {
        $salesOrders = DB::table('transaction.t_sales_order')->get();
        $data = DB::table('transaction.t_delivery_order AS delivery_order')
                ->select('delivery_order.id','delivery_order.travel_permit_no', 'customer.name AS customer_name', 'sales_order.ref_po_customer', 'delivery_order.delivery_date AS actual_delivery_date', 'delivery_order.licence_plate', 'delivery_order.driver_name')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->orderBy('delivery_order.created_at', 'DESC')
                ->paginate(20);
        // dd($data);
        return view('transaction.warehouse.delivery.index', compact('data', 'salesOrders'));
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
            "status" => 1, // 0 = Draft, 1 = On Delivery, 2 = Recieved  by customer, 3 = Rejecte by customer
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return redirect()->route('warehouse.delivery.edit', ['id' => $deliveryOrder]);
    }

    public function edit($id) {
        $deliveryOrder = DB::table('transaction.t_delivery_order AS delivery_order')
                    ->select('sales_order.id AS sales_order_id','sales_order.shipping_address','delivery_order.id','delivery_order.status','delivery_order.travel_permit_no', 'customer.name AS customer_name', 'customer.address', 'customer.phone_number', 'sales_order.transaction_no', 'sales_order.ref_po_customer', 'sales_order.delivery_date AS plan_delivery_date', 'delivery_order.delivery_date AS actual_delivery_date', 'delivery_order.licence_plate', 'delivery_order.driver_name')
                    ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                    ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                    ->where('delivery_order.id', $id)
                    ->first();

        $listSPK = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                    ->select('spk.spk_no','spk.status')
                    ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                    ->where('detail_sales_order.sales_order_id', $deliveryOrder->sales_order_id)
                    ->get();

        $goodsList = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                    ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                    ->leftJoin('transaction.t_detail_delivery_order as detail_delivery_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                    ->select(
                        'detail_sales_order.id',
                        'goods.name AS goods_name',
                        'detail_sales_order.price',
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN 'A' 
                                    WHEN goods.type = '2' THEN 'B' 
                                    WHEN goods.type = '3' THEN 'AB' 
                                    ELSE 'BB' 
                                END AS goods_type"),
                        DB::raw("CASE  
                                    WHEN goods.type IN ('1', '2') THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance) 
                                    WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' | ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance) 
                                END AS specification"),
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit) 
                                    WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit) 
                                    WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' | ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit) 
                                END AS measure"),
                        // DB::raw('COALESCE((detail_sales_order.quantity - detail_delivery_order.quantity), 0) as quantity')
                        DB::raw('CASE
                                    WHEN detail_delivery_order.quantity IS NULL THEN detail_sales_order.quantity
                                    ELSE (detail_sales_order.quantity - detail_delivery_order.quantity)
                                END AS quantity')
                    )
                    ->where('detail_sales_order.sales_order_id', $deliveryOrder->sales_order_id)
                    ->get();

        $detailDeliveryOrder = DB::table('transaction.t_detail_delivery_order as detail_delivery_order')
                    ->select(
                        'detail_delivery_order.id',
                        'goods.name as goods_name',
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance)
                                    WHEN goods.type = '2' THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance)
                                    WHEN goods.type = '3' THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' | ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance)
                                    ELSE CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' | ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance)
                                END AS specification"),
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit)
                                    WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')')
                                    WHEN goods.type = '3' THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit)
                                    ELSE CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' | ', goods.top_length, ' X ', goods.top_width, ' X ', goods.top_height, ' ', goods.top_meas_unit)
                                END AS measure"),
                        'detail_delivery_order.quantity',
                        'detail_delivery_order.remarks'
                    )
                    ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'detail_delivery_order.delivery_order_id')
                    ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                    ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                    ->where('detail_delivery_order.delivery_order_id', $id)
                    ->get();

        return view('transaction.warehouse.delivery.edit', compact('deliveryOrder', 'goodsList', 'detailDeliveryOrder', 'listSPK'));
    }

    public function saveDetail(Request $request) {

        $goods = DB::table('transaction.t_detail_sales_order')->where('id', $request->detail_sales_order_id)->first();

        // Pengecekan jika barang tidak ada dan barang quantity = 0 
        if(!$this->checkGoodsStock($goods->goods_id, $request->quantity)) {
            return redirect()->back()->with('error', 'Stock Tidak Tersedia !!!');
        } 

        DB::table('transaction.t_detail_delivery_order')->insert([
            "delivery_order_id" => $request->delivery_order_id,
            "detail_sales_order_id" => $request->detail_sales_order_id,
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

    public function print($id) {
        $deliveryOrder = DB::table('transaction.t_delivery_order AS delivery_order')
                    ->select('sales_order.id AS sales_order_id','sales_order.shipping_address', 'delivery_order.id','delivery_order.travel_permit_no','delivery_order.delivery_date', 'customer.name AS customer_name', 'sales_order.transaction_no', 'sales_order.ref_po_customer', 'sales_order.tax_type', 'delivery_order.licence_plate', 'delivery_order.driver_name')
                    ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                    ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                    ->where('delivery_order.id', $id)
                    ->first();
        
        $detailDeliveryOrder = DB::table('transaction.t_detail_delivery_order as detail_delivery_order')
                    ->select(
                        'detail_delivery_order.id',
                        'goods.name as goods_name',
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance)
                                    WHEN goods.type = '2' THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance)
                                    WHEN goods.type = '3' THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance)
                                    ELSE CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance)
                                END AS specification"),
                        DB::raw("CASE
                                    WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit)
                                    WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')')
                                    WHEN goods.type = '3' THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit)
                                    ELSE CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' X ', goods.top_height, ' ', goods.top_meas_unit)
                                END AS measure"),
                        'detail_delivery_order.quantity',
                        'detail_delivery_order.remarks'
                    )
                    ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'detail_delivery_order.delivery_order_id')
                    ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                    ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                    ->where('detail_delivery_order.delivery_order_id', $id)
                    ->get();

        if($deliveryOrder->tax_type == 0 || $deliveryOrder->tax_type == 1){
            $pdf = PDF::loadView('transaction.warehouse.delivery.print.print-b', [
                'deliveryOrder' => $deliveryOrder,
                'detailDeliveryOrder' => $detailDeliveryOrder,
            ]);
        } 

        if($deliveryOrder->tax_type == 2 ){
            $pdf = PDF::loadView('transaction.warehouse.delivery.print.print-k', [
                'deliveryOrder' => $deliveryOrder,
                'detailDeliveryOrder' => $detailDeliveryOrder,
            ]);
        }

        if($deliveryOrder->tax_type == 3 ){
            $pdf = PDF::loadView('transaction.warehouse.delivery.print.print-s', [
                'deliveryOrder' => $deliveryOrder,
                'detailDeliveryOrder' => $detailDeliveryOrder,
            ]);
        }
                
        // Set paper size and orientation
        $pdf->setPaper('letter', 'portrait'); // Adjust the paper size and orientation as needed
                
        // Set options for domPDF
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isHtmlParsingEnabled' => true,
            'isCssEnabled' => true,
            'isPhpEnabled' => true,
        ]);
                
        // Download the PDF
        return $pdf->stream($deliveryOrder->travel_permit_no.'.pdf');
    }

    public function checkGoodsStock($goods_id, $quantity) {
        $stock = DB::table('transaction.t_stock_finish_goods as stock')->where('stock.goods_id', $goods_id)->first();

        if($stock == NULL) {
            return false;
        }

        DB::table('transaction.t_stock_finish_goods as stock')->where('stock.id', $stock->id)->update([
            "quantity" => DB::raw('quantity - ' . $quantity),
        ]);

        return true;
    }
}
