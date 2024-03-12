<?php

namespace App\Http\Controllers\transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\CorReportExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Auth;
use PDF;

class ProductionController extends Controller
{
    public function todoList(){
        $data = DB::table('transaction.t_sales_order as sales_order')
                ->select('sales_order.*', 'customer.name as customer_name', 'users.name as assigned_to')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->join('public.users', 'users.id', '=', 'sales_order.assign_to')
                ->where('sales_order.assign_to', Auth::user()->id)
                ->orderBy('sales_order.created_at', 'DESC')
                ->paginate(20);
        return view('transaction.production.todo-list.index', compact('data'));
    }

    public function todoListDetail($id){
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

        return view('transaction.production.todo-list.detail', compact('salesOrder', 'detailSalesOrders'));
    }

    public function claimOrder($id){
        DB::table('transaction.t_sales_order as sales_order')->where('id', $id)->update([
            'status' => 2, // Update status SO to 1 (Claimed by PIC)
        ]);

        return redirect()->back();
    }

    public function spk(){
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id',
                    'spk.spk_no',
                    'goods.name AS goods_name',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A' 
                                WHEN goods.type = '2' THEN 'B' 
                                WHEN goods.type = '3' THEN 'AB' 
                                ELSE 'BB' 
                            END AS goods_type"),
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    DB::raw("CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                    'spk.status'
                )
                ->orderBy('spk.created_at', 'DESC')
                ->paginate(20);
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
            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "specification" => $request->spec,
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
            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "specification" => $request->spec,
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

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "spk_type" => "B",
                "quantity" => $request->bottom_spk_quantity,
                "specification" => $request->bottom_spec,
                "length" => $request->bottom_length,
                "width" => $request->bottom_width,
                "height" => $request->bottom_length,
                "l2" => $request->bottom_l2,
                "p1" => $request->bottom_p1,
                "l1" => $request->bottom_l1,
                "p2" => $request->bottom_p2,
                "t" => $request->bottom_t,
                "plape" => $request->bottom_plape,
                "k" => $request->bottom_k,
                "netto_width" => $request->bottom_netto_width,
                "netto_length" => $request->bottom_netto_length,
                "bruto_width" => $request->bottom_bruto_width,
                "bruto_length" => $request->bottom_bruto_length,
                "sheet_quantity" => $request->bottom_sheet_quantity,
                "flag_stitching" => $request->bottom_flag_stitching,
                "flag_glue" => $request->bottom_flag_glue,
                "flag_pounch" => $request->bottom_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "spk_type" => "A",
                "quantity" => $request->top_spk_quantity,
                "specification" => $request->top_spec,
                "width" => $request->top_width,
                "length" => $request->top_length,
                "netto_width" => $request->top_netto_width,
                "netto_length" => $request->top_netto_length,
                "bruto_width" => $request->top_bruto_width,
                "bruto_length" => $request->top_bruto_length,
                "sheet_quantity" => $request->top_sheet_quantity,
                "flag_stitching" => $request->top_flag_stitching,
                "flag_glue" => $request->top_flag_glue,
                "flag_pounch" => $request->top_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
            
        }

        if ($request->goods_type == 4) {

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->bottom_spk_quantity,
                "specification" => $request->bottom_spec,
                "width" => $request->bottom_width,
                "length" => $request->bottom_length,
                "height" => $request->bottom_length,
                "netto_width" => $request->bottom_netto_width,
                "netto_length" => $request->bottom_netto_length,
                "bruto_width" => $request->bottom_bruto_width,
                "bruto_length" => $request->bottom_bruto_length,
                "sheet_quantity" => $request->bottom_sheet_quantity,
                "flag_stitching" => $request->bottom_flag_stitching,
                "flag_glue" => $request->bottom_flag_glue,
                "flag_pounch" => $request->bottom_flag_pounch,
                
                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
                
            ]);

            $spk = DB::table('transaction.t_spk')->insertGetid([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number($request->goods_type) as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->top_spk_quantity,
                "specification" => $request->top_spec,
                "width" => $request->top_width,
                "length" => $request->top_length,
                "height" => $request->top_length,
                "netto_width" => $request->top_netto_width,
                "netto_length" => $request->top_netto_length,
                "bruto_width" => $request->top_bruto_width,
                "bruto_length" => $request->top_bruto_length,
                "sheet_quantity" => $request->top_sheet_quantity,
                "flag_stitching" => $request->top_flag_stitching,
                "flag_glue" => $request->top_flag_glue,
                "flag_pounch" => $request->top_flag_pounch,

                "status" => 1,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }
        
        return redirect()->route('production.spk.index');
    }

    public function editSPK($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.*',
                    'detail_sales_order.quantity AS order_quantity',
                    'goods.name',
                    'goods.type',
                    'spk.spk_type',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A' 
                                WHEN goods.type = '2' THEN 'B' 
                                WHEN goods.type = '3' THEN 'AB' 
                                ELSE 'BB' 
                            END AS goods_type_name"),
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first();

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

        if($request->process_name == "MUAT" && $request->status == 3) {
            DB::table('transaction.t_spk')->where('id', $request->spk_id)->update([
                "current_process" => $request->process_name,
                "status" => 4, // Completed
                "updated_at" => date('Y-m-d H:i:s'),
                "updated_by" => Auth::user()->name,
            ]);

            $spk = DB::table('transaction.t_spk as spk')
                ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('spk.id', $request->spk_id)
                ->first();

            DB::table('transaction.t_stock_finish_goods')->insert([
                "goods_id" => $spk->goods_id,
                "date" => date('Y-m-d H:i:s'),
                "quantity" => $spk->quantity,
                "source_from" => $spk->spk_no,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        }

        if($request->status == 3) {
            $percentageResult = DB::table('transaction.t_production_process_item')
                            ->selectRaw('(SUM(CASE WHEN spk_id = ? AND status = 3 THEN 1 ELSE 0 END) * 100) / COUNT(*) AS percentage', [$request->spk_id])
                            ->where('spk_id', $request->spk_id)
                            ->first();

            DB::table('transaction.t_spk')->where('id', $request->spk_id)->update([
                "persentage" => $percentageResult->percentage,
                "updated_at" => date('Y-m-d H:i:s'),
                "updated_by" => Auth::user()->name,
            ]);
        }

        return redirect()->route('production.spk.monitoring.detail', ['id' => $request->spk_id]);
    }

    public function schedule($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.*',
                    'detail_sales_order.quantity AS order_quantity',
                    'goods.name',
                    'goods.type',
                    'spk.spk_type',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A' 
                                WHEN goods.type = '2' THEN 'B' 
                                WHEN goods.type = '3' THEN 'AB' 
                                ELSE 'BB' 
                            END AS goods_type_name"),
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first(); 

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
            "quantity" => $spk->quantity,
            "source_from" => $spk->spk_no,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function monitoring() {
        $data = DB::table('transaction.t_detail_sales_order as detail_sales_order')
                ->join('transaction.t_spk as spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('public.users as user', 'user.id', '=', 'sales_order.assign_to')
                ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->select(
                    'spk.id',
                    'spk.*',
                    'goods.name AS goods_name',
                    'customer.name as customer_name',
                    'sales_order.ref_po_customer',
                    'user.name as pic',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A' 
                                WHEN goods.type = '2' THEN 'B' 
                                WHEN goods.type = '3' THEN 'AB' 
                                ELSE 'BB' 
                            END AS goods_type"),
                    'spk.specification',
                    'spk.sheet_quantity',
                    'spk.quantity',
                    DB::raw("CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                    'spk.current_process',
                    DB::raw("CASE
                            WHEN spk.status = '2' THEN 'SCHEDULED' 
                            WHEN spk.status = '3' THEN 'WORK IN PROGRESS' 
                            ELSE 'COMPLETED' 
                        END AS status")
                )
                ->whereIn('spk.status', [2, 3, 4])
                ->orderByDesc('spk.created_at')
                ->paginate(20);

        $productionProcesses = DB::table('master.m_production_process')->get();

        return view('transaction.production.spk.monitoring.index', compact('data', 'productionProcesses'));
    }

    public function monitoringDetail($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.*',
                    'detail_sales_order.quantity AS order_quantity',
                    'goods.name',
                    'goods.type',
                    'spk.spk_type',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'A' 
                                WHEN goods.type = '2' THEN 'B' 
                                WHEN goods.type = '3' THEN 'AB' 
                                ELSE 'BB' 
                            END AS goods_type_name"),
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first();

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
            'operator' => $request->operator,
            'result' => $request->result,
            'remarks' => $request->remarks,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('production.spk.monitoring.production-progress', ['id' => $request->production_process_id]);
    }

    public function monitoringPersonalProgress(Request $request) {
        $spk = DB::table('transaction.t_spk as spk')
                ->select('spk.id', 'spk.spk_no', 'sales_order.ref_po_customer')
                ->join('transaction.t_detail_sales_order AS detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->get();

        $productionProcess = DB::table('master.m_production_process as production_process')
                        ->where('id', $request->process_id)
                        ->first();

        $data = DB::table('transaction.t_detail_production_process_item AS detail_production_process_item')
                ->join('transaction.t_production_process_item AS production_process_item', 'production_process_item.id', '=', 'detail_production_process_item.production_process_item_id')
                ->join('transaction.t_spk AS spk', 'spk.id', '=', 'production_process_item.spk_id')
                ->join('transaction.t_detail_sales_order AS detail_sales_order', 'detail_sales_order.id', '=', 'spk.detail_sales_order_id')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->where('production_process_item.process_id', '=', $request->process_id)
                ->where('detail_production_process_item.date', '=', $request->date)
                ->select(
                    'detail_production_process_item.date',
                    'customer.name',
                    'sales_order.ref_po_customer',
                    'spk.spk_no',
                    'detail_production_process_item.operator',
                    'detail_production_process_item.result',
                    'detail_production_process_item.remarks'
                )
                ->orderBy('detail_production_process_item.created_at', 'DESC')
                ->paginate(20);

        return view('transaction.production.spk.monitoring.personal-prod-progress', compact('productionProcess', 'data', 'spk'));
    }

    public function monitoringPersonalProgressSave(Request $request) {
        $processItem = DB::table('transaction.t_production_process_item')
                    ->where('spk_id', $request->spk_id)
                    ->where('process_id', $request->process_id)
                    ->first();

        DB::table('transaction.t_detail_production_process_item')->insert([
            'production_process_item_id' => $processItem->id,
            'date' => $request->date,
            'operator' => $request->operator,
            'result' => $request->result,
            'remarks' => $request->remarks,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function printSpk($id) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'detail_sales_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id AS spk_id',
                    'spk.spk_no',
                    'spk.spk_type',
                    'spk.*',
                    'spk.length',
                    'spk.width',
                    'spk.height',
                    'detail_sales_order.quantity AS order_quantity',
                    'detail_sales_order.flag_print',
                    'goods.name',
                    'goods.type',
                    'sales_order.*',
                    'customer.name AS customer_name',
                    DB::raw("CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto"),
                    DB::raw("CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto"),
                    DB::raw("CONCAT(spk.length, ' X ', spk.width, ' X ', spk.height) AS measure"),
                    'spk.status'
                )
                ->where('spk.id', $id)
                ->first();

        $productionProcessesItem = DB::table('transaction.t_production_process_item AS item')
                                ->select('item.*', 'process.process_name')
                                ->join('master.m_production_process AS process', 'process.id', '=', 'item.process_id')
                                ->orderBy('item.sequence_order', 'ASC')
                                ->where('item.spk_id', $id)
                                ->get();

        $pdf = PDF::loadView('transaction.production.spk.print', [
                'data' => $data,
                'productionProcessesItem' => $productionProcessesItem,
            ]);                        
                
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
        return $pdf->stream($data->spk_no.'.pdf');
    }

    public function search(Request $request) {
        $data = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                ->join('master.m_goods AS goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->join('transaction.t_spk AS spk', 'spk.detail_sales_order_id', '=', 'detail_sales_order.id')
                ->select(
                    'spk.id',
                    'spk.spk_no',
                    'goods.name AS goods_name',
                    DB::raw("CASE
                                WHEN goods.type = '1' THEN 'SHEET' 
                                WHEN goods.type = '2' THEN 'BOX' 
                                WHEN goods.type = '3' THEN 'BADAN TUTUP (AB)' 
                                ELSE 'BADAN TUTUP (BB)' 
                            END AS goods_type"),
                    DB::raw("CASE  
                                WHEN goods.type IN ('1', '2') THEN CONCAT(goods.ply_type, ' ', goods.flute_type, ' ', goods.substance) 
                                WHEN goods.type IN ('3', '4') THEN CONCAT('<div>',goods.bottom_ply_type, ' ', goods.bottom_flute_type, ' ', goods.bottom_substance, '</div><div>', goods.top_ply_type, ' ', goods.top_flute_type, ' ', goods.top_substance, '</div>') 
                            END AS specification"),
                    DB::raw("CASE
                                WHEN goods.type IN ('1', '2') THEN spk.quantity
                                WHEN goods.type IN ('3', '4') THEN spk.bottom_quantity
                            END AS quantity"),
                    DB::raw("CASE
                                WHEN goods.type IN ('1', '2') THEN spk.sheet_quantity
                                WHEN goods.type IN ('3', '4') THEN spk.bottom_sheet_quantity
                            END AS sheet_quantity"),
                    DB::raw("CASE
                                WHEN goods.type IN ('1', '2') THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) 
                                WHEN goods.type IN ('3', '4') THEN CONCAT('<div>',spk.top_netto_width, ' X ', spk.top_netto_length, '</div><div>', spk.bottom_netto_width, ' X ', spk.bottom_netto_length, '</div>')
                            END AS netto"),
                    DB::raw("CASE
                                WHEN goods.type IN ('1', '2') THEN CONCAT(spk.netto_width, ' X ', spk.netto_length) 
                                WHEN goods.type IN ('3', '4') THEN CONCAT('<div>',spk.top_bruto_width, ' X ', spk.top_bruto_length, '</div><div>', spk.bottom_bruto_width, ' X ', spk.bottom_bruto_length, '</div>')
                            END AS bruto"),
                    'spk.status'
                )
                ->where('spk.spk_no', $request->spk_no)
                ->orderBy('spk.created_at', 'DESC')
                ->paginate(20);

        return view('transaction.production.spk.index', compact('data'));
    }

    public function corReportExport(Request $request) {
        return Excel::download(new CorReportExport($request->start_date, $request->end_date), 'Laporan COR Tanggal '.date("d-m-Y", strtotime($request->start_date)).' - '.date("d-m-Y", strtotime($request->end_date)).'.xlsx');
    }
}