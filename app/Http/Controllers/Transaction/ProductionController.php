<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class ProductionController extends Controller
{
    public function todoList(){
        $data = DB::table('transaction.t_sales_order as sales_order')
                ->select('sales_order.*', 'customer.name as customer_name', 'users.name as assigned_to')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->join('public.users', 'users.id', '=', 'sales_order.assign_to')
                ->where('sales_order.assign_to', Auth::user()->id)
                ->orderBy('sales_order.created_at', 'DESC')
                ->get();
        return view('transaction.production.todo-list.index', compact('data'));
    }

    public function todoListDetail($id){
        $salesOrder = DB::table('transaction.t_sales_order as sales_order')
                        ->select('sales_order.*', 'customer.name as cust_name', 'customer.address', 'customer.phone_number')
                        ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                        ->where('sales_order.id', $id)
                        ->first();

        $detailSalesOrders = DB::select("SELECT
                                        detail_sales_order.id,
                                        goods.name AS goods_name,
                                            CASE
                                                WHEN goods.type = '1' THEN 'SHEET' 
                                                WHEN goods.type = '2' THEN 'BOX' 
                                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                                ELSE 'BADAN TUTUP (BB)' 
                                                END AS goods_type,
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
                                        detail_sales_order.quantity 
                                        FROM transaction.t_detail_sales_order AS detail_sales_order
                                        JOIN master.m_goods AS goods ON goods.id = detail_sales_order.goods_id
                                        WHERE detail_sales_order.sales_order_id = '$id';");

        return view('transaction.production.todo-list.detail', compact('salesOrder', 'detailSalesOrders'));
    }

    public function claimOrder($id){
        DB::table('transaction.t_sales_order as sales_order')->where('id', $id)->update([
            'status' => 2, // Update status SO to 1 (Claimed by PIC)
        ]);

        return redirect()->back();
    }

    public function spk(){
        $data = DB::select("SELECT
                spk.id,
                spk.spk_no,
                goods.name AS goods_name,
                CASE
                    WHEN goods.type = '1' THEN 'SHEET' 
                    WHEN goods.type = '2' THEN 'BOX' 
                    WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                    ELSE 'BADAN TUTUP (BB)' 
                END AS goods_type,
                CASE  
                    WHEN goods.type = '1' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                    WHEN goods.type = '2' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                    WHEN goods.type = '3' THEN CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                    ELSE CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                END AS specification,
                CASE
                    WHEN goods.type = '1' THEN spk.quantity 
                    WHEN goods.type = '2' THEN spk.quantity 
                    WHEN goods.type = '3' THEN spk.bottom_quantity
                    ELSE spk.bottom_quantity
                END AS quantity,
                CASE
                    WHEN goods.type = '1' THEN spk.sheet_quantity
                    WHEN goods.type = '2' THEN spk.sheet_quantity
                    WHEN goods.type = '3' THEN spk.bottom_sheet_quantity
                    ELSE spk.bottom_sheet_quantity
                END AS sheet_quantity,
                CASE
                    WHEN goods.type = '1' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) 
                    WHEN goods.type = '2' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) 
                    WHEN goods.type = '3' THEN CONCAT(spk.top_netto_width, ' X ', spk.top_netto_length, ' / ' , spk.bottom_netto_width, ' X ', spk.bottom_netto_length)
                    ELSE CONCAT(spk.top_netto_width, ' X ', spk.top_netto_length, ' / ' , spk.bottom_netto_width, ' X ', spk.bottom_netto_length)
                END AS netto,
                CASE
                    WHEN goods.type = '1' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) 
                    WHEN goods.type = '2' THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) 
                    WHEN goods.type = '3' THEN CONCAT(spk.top_bruto_width, ' X ', spk.top_bruto_length, ' / ' , spk.bottom_bruto_width, ' X ', spk.bottom_bruto_length)
                    ELSE CONCAT(spk.top_bruto_width, ' X ', spk.top_bruto_length, ' / ' , spk.bottom_bruto_width, ' X ', spk.bottom_bruto_length)
                END AS bruto,
                spk.status
                FROM transaction.t_detail_sales_order AS detail_sales_order
                JOIN master.m_goods AS goods ON goods.id = detail_sales_order.goods_id
                JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                ORDER BY spk.created_at DESC;");
        // dd($data);
        return view('transaction.production.spk.index', compact('data'));
    }

    public function createSPK($id){
        $goodsInformations = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->select('detail_sales_order.id AS detail_sales_order_id','detail_sales_order.quantity', 'goods.*')
                        ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                        ->where('detail_sales_order.id', $id)
                        ->first();

        $totalSPKCreated = DB::table('transaction.t_spk AS spk')
                        ->where('spk.detail_sales_order_id', $id)
                        ->sum('spk.quantity');
        // dd($goodsInformations);
        return view('transaction.production.spk.create', compact('goodsInformations', 'totalSPKCreated'));
    }

    public function saveSPK(Request $request){
        if($request->goods_type == 1) {
            $spk = DB::table('transaction.t_spk')->insertGetId([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "length" => $request->length,
                "width" => $request->width,
                "netto_width" => $request->netto_width,
                "netto_length" => $request->netto_length,
                "bruto_width" => $request->bruto_width,
                "bruto_length" => $request->bruto_length,
                "sheet_quantity" => $request->sheet_quantity,
                "flag_stitching" => $request->flag_stitching,
                "flag_glue" => $request->flag_glue,
                "flag_pounch" => $request->flag_pounch,
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        } 
        
        if ($request->goods_type == 2) {
            $spk = DB::table('transaction.t_spk')->insertGetId([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "length" => $request->length,
                "width" => $request->width,
                "height" => $request->length,
                "l2" => $request->l2,
                "p1" => $request->p1,
                "l1" => $request->l1,
                "p2" => $request->p2,
                "t" => $request->t,
                "plape" => $request->plape,
                "k" => $request->k,
                "netto_width" => $request->netto_width,
                "netto_length" => $request->netto_length,
                "bruto_width" => $request->bruto_width,
                "bruto_length" => $request->bruto_length,
                "sheet_quantity" => $request->sheet_quantity,
                "flag_stitching" => $request->flag_stitching,
                "flag_glue" => $request->flag_glue,
                "flag_pounch" => $request->flag_pounch,
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }
        
        if ($request->goods_type == 3) {
            $spk = DB::table('transaction.t_spk')->insertGetId([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "top_quantity" => $request->top_spk_quantity,
                "top_width" => $request->top_width,
                "top_length" => $request->top_length,
                "top_netto_width" => $request->top_netto_width,
                "top_netto_length" => $request->top_netto_length,
                "top_bruto_width" => $request->top_bruto_width,
                "top_bruto_length" => $request->top_bruto_length,
                "top_sheet_quantity" => $request->top_sheet_quantity,
                "top_flag_stitching" => $request->top_flag_stitching,
                "top_flag_glue" => $request->top_flag_glue,
                "top_flag_pounch" => $request->top_flag_pounch,

                "bottom_quantity" => $request->bottom_spk_quantity,
                "bottom_length" => $request->bottom_length,
                "bottom_width" => $request->bottom_width,
                "bottom_height" => $request->bottom_length,
                "bottom_l2" => $request->bottom_l2,
                "bottom_p1" => $request->bottom_p1,
                "bottom_l1" => $request->bottom_l1,
                "bottom_p2" => $request->bottom_p2,
                "bottom_t" => $request->bottom_t,
                "bottom_plape" => $request->bottom_plape,
                "bottom_k" => $request->bottom_k,
                "bottom_netto_width" => $request->bottom_netto_width,
                "bottom_netto_length" => $request->bottom_netto_length,
                "bottom_bruto_width" => $request->bottom_bruto_width,
                "bottom_bruto_length" => $request->bottom_bruto_length,
                "bottom_sheet_quantity" => $request->bottom_sheet_quantity,
                "bottom_flag_stitching" => $request->bottom_flag_stitching,
                "bottom_flag_glue" => $request->bottom_flag_glue,
                "bottom_flag_pounch" => $request->bottom_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        if ($request->goods_type == 4) {
            $spk = DB::table('transaction.t_spk')->insertGetId([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "top_quantity" => $request->top_spk_quantity,
                "top_width" => $request->top_width,
                "top_length" => $request->top_length,
                "top_height" => $request->top_length,
                "top_netto_width" => $request->top_netto_width,
                "top_netto_length" => $request->top_netto_length,
                "top_bruto_width" => $request->top_bruto_width,
                "top_bruto_length" => $request->top_bruto_length,
                "top_sheet_quantity" => $request->top_sheet_quantity,
                "top_flag_stitching" => $request->top_flag_stitching,
                "top_flag_glue" => $request->top_flag_glue,
                "top_flag_pounch" => $request->top_flag_pounch,

                "bottom_quantity" => $request->bottom_spk_quantity,
                "bottom_width" => $request->bottom_width,
                "bottom_length" => $request->bottom_length,
                "bottom_height" => $request->bottom_length,
                "bottom_netto_width" => $request->bottom_netto_width,
                "bottom_netto_length" => $request->bottom_netto_length,
                "bottom_bruto_width" => $request->bottom_bruto_width,
                "bottom_bruto_length" => $request->bottom_bruto_length,
                "bottom_sheet_quantity" => $request->bottom_sheet_quantity,
                "bottom_flag_stitching" => $request->bottom_flag_stitching,
                "bottom_flag_glue" => $request->bottom_flag_glue,
                "bottom_flag_pounch" => $request->bottom_flag_pounch,
                
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }
        
        return redirect()->route('production.spk.edit', ['id' => $spk]);
    }

    public function editSPK($id) {
        $data = DB::select("SELECT
                                spk.id AS spk_id,
                                spk.spk_no,
                                spk.*,
                                detail_sales_order.quantity AS order_quantity,
                                goods.*,
                                goods.substance AS substance_name,
                            CASE
                                WHEN goods.type = '1' THEN 'SHEET' 
                                WHEN goods.type = '2' THEN 'BOX' 
                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                ELSE 'BADAN TUTUP (BB)' 
                            END AS goods_type_name,
                                spk.quantity,
                                spk.sheet_quantity,
                            CASE
                                WHEN goods.type = '1' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '2' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '3' THEN CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                                ELSE CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                            END AS specification,
                                CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto,
                                CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto,
                                spk.status
                            FROM transaction.t_detail_sales_order AS detail_sales_order
                            JOIN master.m_goods AS goods ON goods.id = detail_sales_order.goods_id 
                            JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                            WHERE spk.id = '$id'");

        $productionProcesses = DB::table('master.m_production_process')->get();

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                                ->select('item.*', 'process.process_name')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->orderBy('item.sequence_order', 'ASC')
                                ->where('item.spk_id', $id)
                                ->get();
        // dd($data);
        return view('transaction.production.spk.edit', compact('data', 'productionProcesses', 'productionProcessesItem'));
    }

    public function progressItemSave(Request $request) {
        DB::table('transaction.t_production_process_item')->insert([
            "spk_id" => $request->spk_id,
            "process_id" => $request->process_id,
            "sequence_order" => $request->sequence_order,
            "status" => 1,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('production.spk.edit', ['id' => $request->spk_id]);
    }

    public function progressItemUpdate(Request $request) {
        DB::table('transaction.t_production_process_item')->where('id', $request->production_process_id)->update([
            "status" => $request->status,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        if($request->status == 2) {
            DB::table('transaction.t_spk')->where('id', $request->spk_id)->update([
                "current_process" => $request->process_name,
                "status" => 3, // Work in Progress
                "updated_at" => date('Y-m-d H:i:s'),
                "updated_by" => Auth::user()->name,
            ]);
        }

        return redirect()->route('production.spk.monitoring.production-progress', ['id' => $request->production_process_id]);
    }

    public function schedule($id) {
        $data = DB::select("SELECT
                                spk.id AS spk_id,
                                spk.spk_no,
                                spk.*,
                                detail_sales_order.quantity AS order_quantity,
                                goods.*,
                                goods.substance AS substance_name,
                            CASE
                                WHEN goods.type = '1' THEN 'SHEET' 
                                WHEN goods.type = '2' THEN 'BOX' 
                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                ELSE 'BADAN TUTUP (BB)' 
                            END AS goods_type_name,
                                spk.quantity,
                                spk.sheet_quantity,
                            CASE
                                WHEN goods.type = '1' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '2' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '3' THEN CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                                ELSE CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                            END AS specification,
                                CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto,
                                CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto,
                                spk.status
                            FROM transaction.t_detail_sales_order AS detail_sales_order
                            JOIN master.m_goods AS goods ON goods.id = detail_sales_order.goods_id 
                            JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                            WHERE spk.id = '$id'");

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->orderBy('item.sequence_order', 'ASC')
                                ->where('item.spk_id', $id)
                                ->get();

        return view('transaction.production.spk.schedule', compact('data', 'productionProcessesItem'));
    }

    public function scheduleSave(Request $request){
        $data = DB::table('transaction.t_spk AS spk')->where('spk.id', $request->id)->update([
            "start_date" => $request->start_date,
            "status" => 2, // SPK Scheduled
            "current_process" => 0,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('production.spk.index');
    }
    

    public function markAsDone($spk_id){
        DB::table('transaction.t_spk as spk')->where('id', $spk_id)->update([
            "status" => 4, // Update status SPK To Done
            "finish_date" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        $spk = DB::table('transaction.t_spk as spk')
                ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('spk.id', $spk_id)
                ->first();

        DB::table('transaction.t_stock_finish_goods')->insert([
            "goods_id" => $spk->goods_id,
            "date" => date('Y-m-d H:i:s'),
            "quantity" => $spk->quantity,
            "source_from" => $spk->spk_no,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function monitoring() {
        $data = DB::select("SELECT
                            sales_order.ref_po_customer,
                            customer.name AS customer_name,
                            spk.id,
                            spk.spk_no,
                            spk.start_date,
                            spk.bruto_width,
                            spk.bruto_length,
                            goods.name AS goods_name,
                            CASE
                                WHEN goods.type = '1' THEN 'SHEET' 
                                WHEN goods.type = '2' THEN 'BOX' 
                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                ELSE 'BADAN TUTUP (BB)' 
                            END AS goods_type_name,
                            spk.quantity,
                            spk.sheet_quantity,
                            CASE
                                WHEN goods.type = '1' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '2' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '3' THEN CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                                ELSE CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                            END AS specification,
                            -- substance.cor_code,
                            spk.status,
                            spk.current_process
                            FROM transaction.t_detail_sales_order AS detail_sales_order
                            JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                            JOIN transaction.t_sales_order AS sales_order ON sales_order.id = detail_sales_order.sales_order_id
                            JOIN master.m_goods AS goods ON goods.id = detail_sales_order.goods_id
                            -- JOIN master.m_substance AS substance ON substance.substance = goods.substance
                            JOIN master.m_customer AS customer ON customer.id = sales_order.customer_id
                            WHERE spk.status IN (2, 3, 4) 
                            ORDER BY spk.created_at DESC;");
        return view('transaction.production.spk.monitoring.index', compact('data'));
    }

    public function monitoringDetail($id) {
        $data = DB::select("SELECT
                                spk.id AS spk_id,
                                spk.spk_no,
                                spk.*,
                                detail_sales_order.quantity AS order_quantity,
                                goods.*,
                                goods.substance AS substance_name,
                            CASE
                                WHEN goods.type = '1' THEN 'SHEET' 
                                WHEN goods.type = '2' THEN 'BOX' 
                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                ELSE 'BADAN TUTUP (BB)' 
                            END AS goods_type_name,
                                spk.quantity,
                                spk.sheet_quantity,
                            CASE
                                WHEN goods.type = '1' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '2' THEN CONCAT ( goods.ply_type, ' ', goods.flute_type, ' ', goods.substance ) 
                                WHEN goods.type = '3' THEN CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                                ELSE CONCAT ( goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance , ' / ', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance ) 
                            END AS specification,
                                CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto,
                                CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto,
                                spk.status
                            FROM transaction.t_detail_sales_order AS detail_sales_order
                            JOIN master.m_goods AS goods ON goods.id = detail_sales_order.goods_id 
                            JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                            WHERE spk.id = '$id'");

        $productionProcesses = DB::table('master.m_production_process')->get();

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                                ->select('item.*', 'process.process_name')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->orderBy('item.sequence_order', 'ASC')
                                ->where('item.spk_id', $id)
                                ->get();
        
        return view('transaction.production.spk.monitoring.monitoring-detail', compact('data', 'productionProcesses', 'productionProcessesItem'));
    }

    public function progressProductionUpdate($id) {
        $processItem = DB::table('transaction.t_production_process_item AS item')
                                ->select('item.id', 'process.process_name', 'item.status', 'item.spk_id')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->where('item.id', $id)
                                ->first();

        $processItemDetails = DB::table('transaction.t_detail_production_process_item AS detail_production_process')
                            ->where('detail_production_process.production_process_item_id', $processItem->id)
                            ->get();
                            
        return view('transaction.production.spk.monitoring.prod-progress', compact('processItem', 'processItemDetails'));
    }

    public function progressProductionDetailSave(Request $request) {
        DB::table('transaction.t_detail_production_process_item')->insert([
            'production_process_item_id' => $request->production_process_id,
            'date' => $request->date,
            'operator_id' => $request->operator,
            'result' => $request->result,
            'remarks' => $request->remarks,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('production.spk.monitoring.production-progress', ['id' => $request->production_process_id]);
    }
}
