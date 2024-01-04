<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class SalesOrderController extends Controller
{
    public function index() {
        $data = DB::table('transaction.t_sales_order as sales_order')
                ->select('sales_order.*', 'customer.name as customer_name', 'users.name as assigned_to')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->leftJoin('public.users', 'users.id', '=', 'sales_order.assign_to')
                ->orderBy('sales_order.created_at', 'DESC')
                ->get();
        return view('transaction.sales-order.index', compact('data'));
    }

    public function create() {
        $customers = DB::table('master.m_customer')->get();
        $users = DB::table('users')->get();
        return view('transaction.sales-order.create', compact('customers', 'users'));
    }

    public function save(Request $request) {
        // $attachment = $request->file('attachment');
        // $attachmentData = base64_encode(file_get_contents($attachment));

        $salesOrder = DB::table('transaction.t_sales_order')
                    ->insertGetId([
                        'transaction_no' => DB::select("SELECT transaction.generate_sales_order_number() as transaction_no")[0]->transaction_no,
                        'ref_po_customer' => $request->ref_po_customer,
                        'customer_id' => $request->customer_id,
                        'order_date' => $request->order_date,
                        'delivery_date' => $request->delivery_date,
                        'tax_type' => $request->tax_type,
                        'assign_to' => $request->assign_to,
                        'status' => 0, // 0 = initial (Inputed By Sales), 1 = Claimed by production PIC, 3 = SPK created (Pratial) 4 = SPK Finish created (All)
                        'attachment' => "",
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
                        ->where('sales_order.id', $id)
                        ->first();

        $detailSalesOrders = DB::select("
                            SELECT
                            detail_sales_order.ID,
                            detail_sales_order.goods_name,
                            CASE
                                    WHEN detail_sales_order.goods_type = 1 THEN
                                    'Sheet' 
                                    WHEN detail_sales_order.goods_type = 2 THEN
                                    'Box' 
                                    WHEN detail_sales_order.goods_type = 3 THEN
                                    'Box Badan Tutup' ELSE'Unknown Type' 
                                END AS goods_type_name,
                            CASE
                                    WHEN detail_sales_order.goods_type = 1 THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance, ' ', detail_sales_order.measurement_type ) 
                                    WHEN detail_sales_order.goods_type = 2 THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance, ' ', detail_sales_order.measurement_type ) 
                                    WHEN detail_sales_order.goods_type = 3 THEN
                                    'Box Badan Tutup' ELSE'Unknown Type' 
                                END AS specification,
                            CASE
                                    WHEN detail_sales_order.goods_type = 1 THEN
                                    CONCAT(detail_sales_order.length, ' X ', detail_sales_order.width, ' ',  detail_sales_order.measurement_unit)
                                    WHEN detail_sales_order.goods_type = 2 THEN
                                    CONCAT(detail_sales_order.length, ' X ', detail_sales_order.width, ' X ', detail_sales_order.height, ' ',  detail_sales_order.measurement_unit)
                                    WHEN detail_sales_order.goods_type = 3 THEN
                                    'Box Badan Tutup' ELSE'Unknown Type' 
                                END AS measure,
                                detail_sales_order.quantity 
                            FROM
                                TRANSACTION.t_detail_sales_order AS detail_sales_order
                                LEFT JOIN master.m_substance AS substance ON substance.ID = detail_sales_order.substance_id 
                            WHERE
                                detail_sales_order.sales_order_id = '$id';");
        return view('transaction.sales-order.edit', compact('customers', 'salesOrder', 'users', 'detailSalesOrders'));
    }

    public function update($id){

    }

    public function createDetail($id) {
        $substances = DB::table('master.m_substance')->get();
        return view('transaction.sales-order.detail.create', compact('substances', 'id'));
    }

    public function saveDetail(Request $request){

        if($request->goods_type == 1) {
            DB::table('transaction.t_detail_sales_order')->insert([
                "goods_name" => $request->goods_name,
                "sales_order_id" => $request->sales_order_id,
                "goods_type" => $request->goods_type,
                "quantity" => $request->quantity,
                "price" => $request->price,
                "ply_type" => $request->ply_type,
                "flute_type" => $request->flute_type,
                "substance_id" => $request->substance,
                "measurement_unit" => $request->measurement_unit,
                "measurement_type" => $request->measurement_type,
                "length" => $request->length,
                "width" => $request->width,
                "flag_finishing" => $request->flag_finishing,
                "remarks" => $request->goods_name,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => Auth::user()->name,
            ]);
        } else if ($request->goods_type == 2) {
            DB::table('transaction.t_detail_sales_order')->insert([
                "goods_name" => $request->goods_name,
                "sales_order_id" => $request->sales_order_id,
                "goods_type" => $request->goods_type,
                "quantity" => $request->quantity,
                "price" => $request->price,
                "ply_type" => $request->ply_type,
                "flute_type" => $request->flute_type,
                "substance_id" => $request->substance,
                "measurement_unit" => $request->measurement_unit,
                "measurement_type" => $request->measurement_type,
                "length" => $request->length,
                "width" => $request->width,
                "height" => $request->height,
                "flag_finishing" => $request->flag_finishing,
                "remarks" => $request->goods_name,
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => Auth::user()->name,
            ]);
        } else {

        }
        

        return redirect()->route('sales.edit', ['id' => $request->sales_order_id]);
    }

    public function editDetail(){

    }

    public function updateDetail(){
        
    }

    public function deleteDetail(){
        
    }
}