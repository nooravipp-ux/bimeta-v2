<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class RawMaterialController extends Controller
{
    public function index() {
        $materials = DB::table('master.m_material')->get();

        $stocks = DB::table('transaction.t_stock_raw_material as stock_raw_material')
                ->select('stock_raw_material.id','stock_raw_material.no_roll', 'material.name')
                ->join('master.m_material as material', 'material.id', '=', 'stock_raw_material.material_id')
                ->get();

        $data = DB::table('transaction.t_stock_raw_material as raw_material')
                ->select('material.name', 'raw_material.*')
                ->join('master.m_material as material', 'material.id', '=', 'raw_material.material_id')
                ->paginate(20);

        return view('transaction.warehouse.raw-material.index', compact('data', 'materials', 'stocks'));
    }

    public function saveStockOpname(Request $request) {
        DB::table('transaction.t_stock_raw_material')->insert([
            "material_id" => $request->material_id,
            "width" => $request->width,
            "no_roll" => $request->no_roll,
            "weight" => $request->weight,
            "source_from" => $request->reference,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function saveStockAdjustment(Request $request) {
        $stock = DB::table('transaction.t_stock_raw_material')->where('id', $request->stock_id)->first();

        $totalStock = (int)$stock->weight + (int)$request->weight;
        DB::table('transaction.t_stock_raw_material')->where('id', $request->stock_id)->update([
            "weight" => $totalStock,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }

    public function printLabel($id) {
        $stock = DB::table('transaction.t_stock_raw_material as stock_raw_material')
                ->select('stock_raw_material.*', 'material.name', 'material.gramature', 'material.unit')
                ->join('master.m_material as material', 'material.id', '=', 'stock_raw_material.material_id')
                ->where('stock_raw_material.id', $id)
                ->first();

        $pdf = PDF::loadView('transaction.warehouse.raw-material.print', [
            'data' => $stock,
        ]);
                
        // Set paper size and orientation
        $pdf->setPaper('a4', 'portrait'); // Adjust the paper size and orientation as needed
                
        // Set options for domPDF
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            'isHtmlParsingEnabled' => true,
            'isCssEnabled' => true,
            'isPhpEnabled' => true,
        ]);
                
        // Download the PDF
        return $pdf->stream($stock->no_roll.'.pdf');
    }
}
