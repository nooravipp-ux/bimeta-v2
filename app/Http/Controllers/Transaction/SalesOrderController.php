<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class SalesOrderController extends Controller
{
    public function index() {
        $customers = DB::table('master.m_customer')->get();
        $users = DB::table('users')->get();
        $data = DB::table('transaction.t_sales_order as sales_order')
                ->select('sales_order.*', 'customer.name as customer_name', 'users.name as assigned_to')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->leftJoin('public.users', 'users.id', '=', 'sales_order.assign_to')
                ->orderBy('sales_order.created_at', 'DESC')
                ->paginate(10);
        return view('transaction.sales-order.index', compact('data', 'customers', 'users'));
    }

    public function create() {
        $customers = DB::table('master.m_customer')->get();
        $users = DB::table('users')->get();
        return view('transaction.sales-order.create', compact('customers', 'users'));
    }

    public function save(Request $request) {
        $salesOrder = DB::table('transaction.t_sales_order')
                    ->insertGetId([
                        'transaction_no' => DB::select("SELECT transaction.generate_sales_order_number() as transaction_no")[0]->transaction_no,
                        'ref_po_customer' => $request->ref_po_customer,
                        'customer_id' => $request->customer_id,
                        'order_date' => $request->order_date,
                        'delivery_date' => $request->delivery_date,
                        'tax_type' => $request->tax_type,
                        'assign_to' => $request->assign_to,
                        'status' => 1, // 0 = initial (Inputed By Sales), 1 = Claimed by production PIC, 3 = SPK created (Pratial) 4 = SPK Finish created (All)
                        'shipping_address' => $request->shipping_address,
                        'remarks' => $request->remarks,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => Auth::user()->name,
                    ]);

        return redirect()->route('sales.edit', ['id' => $salesOrder]);
    }

    public function edit($id) {
        $users = DB::table('public.users')->get();
        $customers = DB::table('master.m_customer')->get();
        $salesOrder = DB::table('transaction.t_sales_order as sales_order')
                        ->select('sales_order.*', 'customer.name as cust_name', 'customer.address', 'customer.phone_number')
                        ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                        ->where('sales_order.id', $id)
                        ->first();

        $detailSalesOrders = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->select(
                            'detail_sales_order.id',
                            'goods.name AS goods_name',
                            'detail_sales_order.price',
                            DB::raw("CASE
                                        WHEN goods.type = '1' THEN 'SHEET' 
                                        WHEN goods.type = '2' THEN 'BOX' 
                                        WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                        ELSE 'BADAN TUTUP (BB)' 
                                    END AS goods_type"),
                            DB::raw("CASE  
                                        WHEN goods.type IN ('1', '2') THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance) 
                                        WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance) 
                                    END AS specification"),
                            DB::raw("CASE
                                        WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit) 
                                        WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')') 
                                        WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit) 
                                    END AS measure"),
                            'detail_sales_order.quantity'
                        )
                        ->where('detail_sales_order.sales_order_id', $id)
                        ->get();

        $data = DB::table('master.m_goods AS goods')
                        ->select(
                            'goods.name AS goods_name',
                            'goods.id',
                            DB::raw("CASE
                                        WHEN goods.type = '1' THEN 'SHEET' 
                                        WHEN goods.type = '2' THEN 'BOX' 
                                        WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                        ELSE 'BADAN TUTUP (BB)' 
                                    END AS goods_type"),
                            DB::raw("CASE  
                                        WHEN goods.type IN ('1', '2') THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance) 
                                        WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance) 
                                    END AS specification"),
                            DB::raw("CASE
                                        WHEN goods.type = '1' THEN CONCAT(goods.length, ' X ', goods.width, ' ', goods.meas_unit) 
                                        WHEN goods.type = '2' THEN CONCAT(goods.length, ' X ', goods.width, ' X ', goods.height, ' ', goods.meas_unit, ' (', goods.meas_type, ')') 
                                        WHEN goods.type IN ('3', '4') THEN CONCAT(goods.bottom_length, ' X ', goods.bottom_width, ' X ', goods.bottom_height, ' ', goods.bottom_meas_unit, ' / ', goods.top_length, ' X ', goods.top_width, ' ', goods.top_meas_unit) 
                                    END AS measure")
                        )
                        ->get();

        return view('transaction.sales-order.edit', compact('customers', 'salesOrder', 'users', 'detailSalesOrders', 'data'));
    }

    public function update($id){

    }

    public function createDetail($id) {
        $substances = DB::table('master.m_substance')->get();
        return view('transaction.sales-order.detail.create', compact('substances', 'id', 'data'));
    }

    public function saveDetail(Request $request){

        DB::table('transaction.t_detail_sales_order')->insert([
            "sales_order_id" => $request->sales_order_id,
            "goods_id" => $request->goods_id,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "flag_print" => $request->flag_print,
            "remarks" => $request->remarks,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => Auth::user()->name,
        ]);

        return redirect()->route('sales.edit', ['id' => $request->sales_order_id]);
    }

    public function editDetail(){

    }

    public function updateDetail(){
        
    }

    public function deleteDetail($id){
        DB::table('transaction.t_detail_sales_order')->where('id', $id)->delete();
        return redirect()->back();
    }
}