<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class PurchaseOrderController extends Controller
{
    public function index(){
        $suppliers = DB::table('master.m_supplier')->get();
        $data = DB::table('transaction.t_purchase as purchase')
                    ->select('purchase.*', 'supplier.name', 'supplier.code')
                    ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                    ->paginate(20);
        return view('transaction.procurement.purchase-order.index', compact('data', 'suppliers'));
    }

    public function create() {
        $suppliers = DB::table('master.m_supplier')->get();
        return view('transaction.procurement.purchase-order.create', compact('suppliers'));
    }

    public function save(Request $request) {
        $purchaseOrder = DB::table('transaction.t_purchase')
                    ->insertGetId([
                        'po_no' => DB::select("SELECT transaction.generate_purchase_order_number() as po_no")[0]->po_no,
                        'supplier_id' => $request->supplier_id,
                        'date' => $request->date,
                        'tax_type' => $request->tax_type,
                        'status' => 1,
                        'remarks' => $request->remarks,
                        'created_at' => date('Y-m-d H:i:s'),
                        'created_by' => Auth::user()->name,
                    ]);

        return redirect()->route('procurement.purchase-order.edit', ['id' => $purchaseOrder]);
    }

    public function edit($id) {  
        $purchase = DB::table('transaction.t_purchase as purchase')
                    ->select('purchase.*', 'supplier.name', 'supplier.code')
                    ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                    ->where('purchase.id', $id)
                    ->first();
        
        $materials = DB::table('master.m_material')->get();

        $data = DB::table('transaction.t_detail_purchase as detail_purchase')
                ->select('detail_purchase.*', 'material.name', 'material.gramature', 'material.unit')
                ->join('master.m_material as material', 'material.id', '=', 'detail_purchase.material_id')
                ->where('detail_purchase.purchase_id', $id)
                ->get();

        return view('transaction.procurement.purchase-order.edit', compact('purchase','data', 'materials'));
    }

    public function saveDetail(Request $request){
        DB::table('transaction.t_detail_purchase')->insert([
            "purchase_id" => $request->purchase_id,
            "material_id" => $request->material_id,
            "width" => $request->width,
            "measure_unit" => $request->measure_unit,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->route('procurement.purchase-order.edit', ['id' => $request->purchase_id]);
    }

    public function deleteDetail($id){
        DB::table('transaction.t_detail_purchase')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function print($id) {
        $purchaseOrder = DB::table('transaction.t_purchase as purchase')
                    ->select('purchase.*', 'supplier.name', 'supplier.code')
                    ->join('master.m_supplier as supplier', 'supplier.id', '=', 'purchase.supplier_id')
                    ->where('purchase.id', $id)
                    ->first();

        $detailPurchaseOrder = DB::table('transaction.t_detail_purchase as detail_purchase')
                ->select('detail_purchase.*', 'material.name', 'material.gramature', 'material.unit')
                ->join('master.m_material as material', 'material.id', '=', 'detail_purchase.material_id')
                ->where('detail_purchase.purchase_id', $id)
                ->get();

        $pdf = PDF::loadView('transaction.procurement.purchase-order.print', [
            'purchaseOrder' => $purchaseOrder,
            'detailPurchaseOrder' => $detailPurchaseOrder,
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
        return $pdf->stream($purchaseOrder->po_no.'.pdf');
    }
}
