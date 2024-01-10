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
                        ->select('sales_order.*', 'customer.name as customer_name', 'public.users.name as pic_name')
                        ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                        ->join('public.users', 'users.id', '=', 'sales_order.assign_to')
                        ->where('sales_order.id', $id)
                        ->first();

        $detailSalesOrders = DB::select("
                        SELECT
                        detail_sales_order.ID,
                        detail_sales_order.goods_name,
                        CASE
                                WHEN detail_sales_order.goods_type = 1 THEN
                                'SHEET' 
                                WHEN detail_sales_order.goods_type = 2 THEN
                                'BOX' 
                                WHEN detail_sales_order.goods_type = 3 THEN
                                'Box Badan Tutup' 
                                ELSE'Unknown Type' 
                            END AS goods_type_name,
                        CASE
                                WHEN detail_sales_order.goods_type = 1 THEN
                                CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance, ' ', detail_sales_order.meas_type ) 
                                WHEN detail_sales_order.goods_type = 2 THEN
                                CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance, ' ', detail_sales_order.meas_type ) 
                                WHEN detail_sales_order.goods_type = 3 THEN
                                'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS specification,
                        CASE
                                WHEN detail_sales_order.goods_type = 1 THEN
                                CONCAT(detail_sales_order.length, ' X ', detail_sales_order.width, ' ',  detail_sales_order.meas_unit)
                                WHEN detail_sales_order.goods_type = 2 THEN
                                CONCAT(detail_sales_order.length, ' X ', detail_sales_order.width, ' X ', detail_sales_order.height, ' ',  detail_sales_order.meas_unit)
                                WHEN detail_sales_order.goods_type = 3 THEN
                                'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS measure,
                            detail_sales_order.quantity 
                        FROM
                            TRANSACTION.t_detail_sales_order AS detail_sales_order
                            LEFT JOIN master.m_substance AS substance ON substance.ID = detail_sales_order.substance_id 
                        WHERE
                        detail_sales_order.sales_order_id = '$id';");
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
                detail_sales_order.goods_name,
                CASE
                    WHEN detail_sales_order.goods_type = '1' THEN
                    'SHEET' 
                    WHEN detail_sales_order.goods_type = '2' THEN
                    'BOX' 
                    WHEN detail_sales_order.goods_type = '3' THEN
                    'Box Badan Tutup' ELSE'Unknown Type' 
                END AS goods_type_name,
                spk.quantity,
                spk.sheet_quantity,
                CASE
                    WHEN detail_sales_order.goods_type = '1' THEN
                        CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                    WHEN detail_sales_order.goods_type = '2' THEN
                        CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                    WHEN detail_sales_order.goods_type = '3' THEN
                        'Box Badan Tutup' ELSE'Unknown Type' 
                END AS specification,
                CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto,
                CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto,
                spk.status
                FROM transaction.t_detail_sales_order AS detail_sales_order
                JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                JOIN master.m_substance AS substance ON substance.id = detail_sales_order.substance_id
                ORDER BY spk.created_at DESC;");
        // dd($data);
        return view('transaction.production.spk.index', compact('data'));
    }

    public function createSPK($id){
        $goodsInformations = DB::table('transaction.t_detail_sales_order AS detail_sales_order')
                        ->select('detail_sales_order.*', 'substance.substance AS substance_name')
                        ->join('master.m_substance AS substance', 'substance.id', '=', 'detail_sales_order.substance_id')
                        ->where('detail_sales_order.id', $id)
                        ->first();

        $totalSPKCreated = DB::table('transaction.t_spk AS spk')
                        ->where('spk.detail_sales_order_id', $id)
                        ->sum('spk.quantity');
        return view('transaction.production.spk.create', compact('goodsInformations', 'totalSPKCreated'));
    }

    public function saveSPK(Request $request){
        if($request->goods_type == 1) {
            $spk = DB::table('transaction.t_spk')->insertGetId([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
                "netto_width" => $request->netto_width,
                "netto_length" => $request->netto_length,
                "bruto_width" => $request->bruto_width,
                "bruto_length" => $request->bruto_length,
                "sheet_quantity" => $request->sheet_quantity,
                "status" => 1,
                "flag_stitching" => $request->flag_stitching,
                "flag_glue" => $request->flag_glue,
                "flag_pounch" => $request->flag_pounch,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        } else if ($request->goods_type == 2) {
            $spk = DB::table('transaction.t_spk')->insertGetId([
                "spk_no" => DB::select("SELECT transaction.generate_spk_number() as spk_no")[0]->spk_no,
                "detail_sales_order_id" => $request->detail_sales_order_id,
                "quantity" => $request->spk_quantity,
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
                "status" => 1,
                "flag_stitching" => $request->flag_stitching,
                "flag_glue" => $request->flag_glue,
                "flag_pounch" => $request->flag_pounch,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name,
            ]);
        } else {

        }
        
        return redirect()->route('production.spk.edit', ['id' => $spk]);
    }

    public function editSPK($id) {
        $data = DB::select("SELECT
                            spk.id AS spk_id,
                            spk.spk_no,
                            spk.*,
                            detail_sales_order.quantity AS order_quantity,
                            detail_sales_order.*,
                            substance.substance AS substance_name,
                            CASE
                                WHEN detail_sales_order.goods_type = '1' THEN
                                'SHEET' 
                                WHEN detail_sales_order.goods_type = '2' THEN
                                'BOX' 
                                WHEN detail_sales_order.goods_type = '3' THEN
                                'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS goods_type_name,
                            spk.quantity,
                            spk.sheet_quantity,
                            CASE
                                WHEN detail_sales_order.goods_type = '1' THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                                WHEN detail_sales_order.goods_type = '2' THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                                WHEN detail_sales_order.goods_type = '3' THEN
                                    'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS specification,
                            CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto,
                            CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto,
                            spk.status
                            FROM transaction.t_detail_sales_order AS detail_sales_order
                            JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                            JOIN master.m_substance AS substance ON substance.id = detail_sales_order.substance_id
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
                            detail_sales_order.*,
                            substance.substance AS substance_name,
                            CASE
                                WHEN detail_sales_order.goods_type = '1' THEN
                                'SHEET' 
                                WHEN detail_sales_order.goods_type = '2' THEN
                                'BOX' 
                                WHEN detail_sales_order.goods_type = '3' THEN
                                'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS goods_type_name,
                            spk.quantity,
                            spk.sheet_quantity,
                            CASE
                                WHEN detail_sales_order.goods_type = '1' THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                                WHEN detail_sales_order.goods_type = '2' THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                                WHEN detail_sales_order.goods_type = '3' THEN
                                    'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS specification,
                            CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto,
                            CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto,
                            spk.status
                            FROM transaction.t_detail_sales_order AS detail_sales_order
                            JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                            JOIN master.m_substance AS substance ON substance.id = detail_sales_order.substance_id
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

    public function markAsDone($id){
        DB::table('transaction.t_spk as spk')->where('id', $id)->update([
            "status" => 4, // Update status SPK To Done
            "finish_date" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
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
                detail_sales_order.goods_name,
                CASE
                    WHEN detail_sales_order.goods_type = '1' THEN
                    'SHEET' 
                    WHEN detail_sales_order.goods_type = '2' THEN
                    'BOX' 
                    WHEN detail_sales_order.goods_type = '3' THEN
                    'Box Badan Tutup' ELSE'Unknown Type' 
                END AS goods_type_name,
                spk.quantity,
                spk.sheet_quantity,
                CASE
                    WHEN detail_sales_order.goods_type = '1' THEN
                        CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                    WHEN detail_sales_order.goods_type = '2' THEN
                        CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                    WHEN detail_sales_order.goods_type = '3' THEN
                        'Box Badan Tutup' ELSE'Unknown Type' 
                END AS specification,
                substance.cor_code,
                spk.status,
                spk.current_process
                FROM transaction.t_detail_sales_order AS detail_sales_order
                JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                JOIN master.m_substance AS substance ON substance.id = detail_sales_order.substance_id
                JOIN transaction.t_sales_order AS sales_order ON sales_order.id = detail_sales_order.sales_order_id
                JOIN master.m_customer AS customer ON customer.id = sales_order.customer_id
                WHERE spk.status IN (2, 3, 4) 
                ORDER BY spk.created_at DESC;");
        // dd($data);
        return view('transaction.production.spk.monitoring.index', compact('data'));
    }

    public function monitoringDetail($id) {
        $data = DB::select("SELECT
                            spk.id AS spk_id,
                            spk.spk_no,
                            spk.*,
                            detail_sales_order.*,
                            detail_sales_order.quantity AS order_quantity,
                            substance.substance AS substance_name,
                            CASE
                                WHEN detail_sales_order.goods_type = '1' THEN
                                'SHEET' 
                                WHEN detail_sales_order.goods_type = '2' THEN
                                'BOX' 
                                WHEN detail_sales_order.goods_type = '3' THEN
                                'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS goods_type_name,
                            spk.quantity,
                            spk.sheet_quantity,
                            CASE
                                WHEN detail_sales_order.goods_type = '1' THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                                WHEN detail_sales_order.goods_type = '2' THEN
                                    CONCAT ( detail_sales_order.ply_type, ' ', detail_sales_order.flute_type, ' ', substance.substance) 
                                WHEN detail_sales_order.goods_type = '3' THEN
                                    'Box Badan Tutup' ELSE'Unknown Type' 
                            END AS specification,
                            CONCAT(spk.netto_width, ' X ', spk.netto_length) AS netto,
                            CONCAT(spk.bruto_width, ' X ', spk.bruto_length) AS bruto,
                            spk.status
                            FROM transaction.t_detail_sales_order AS detail_sales_order
                            JOIN transaction.t_spk AS spk ON spk.detail_sales_order_id = detail_sales_order.id
                            JOIN master.m_substance AS substance ON substance.id = detail_sales_order.substance_id
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
