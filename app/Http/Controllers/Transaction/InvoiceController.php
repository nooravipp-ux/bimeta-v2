<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

class InvoiceController extends Controller
{
    public function index() {
        $references = DB::table('transaction.t_sales_order as sales_order')
                    ->select('sales_order.id','sales_order.ref_po_customer', 'customer.name')
                    ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                    ->get();

        $data = DB::table('transaction.t_invoice as invoice')
                ->select('invoice.id', 'invoice.invoice_no', 'invoice.date','sales_order.tax_type','sales_order.ref_po_customer', 'customer.name as customer_name')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'invoice.sales_order_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->paginate(10);

        return view('transaction.finance.invoices.index', compact('references', 'data'));
    }

    public function save(Request $request) {
        $invoice = DB::table('transaction.t_invoice')->insertGetId([
            "invoice_no" => DB::select("SELECT transaction.generate_invoice_number() as inv_no")[0]->inv_no,
            "sales_order_id" => $request->sales_order_id,
            "date" => $request->date,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->route('finance.invoice.edit', ['id' => $invoice]);
    }

    public function edit($id) {

        $invoice = DB::table('transaction.t_invoice as invoice')
                ->select('invoice.id', 'invoice.invoice_no', 'invoice.date', 'sales_order.id as sales_order_id', 'sales_order.tax_type','sales_order.ref_po_customer', 'customer.name as customer_name')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'invoice.sales_order_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->where('invoice.id', $id)
                ->first();

        $shipmentList = DB::table('transaction.t_delivery_order AS delivery_order')
                ->select('delivery_order.id','delivery_order.travel_permit_no', 'sales_order.ref_po_customer')
                ->join('transaction.t_sales_order AS sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                ->join('master.m_customer AS customer', 'customer.id', '=', 'sales_order.customer_id')
                ->where('sales_order_id', $invoice->sales_order_id)
                ->whereIn('sales_order.tax_type', [0,1,2])
                ->get();

        $detailInvoice = DB::table('transaction.t_detail_invoice as detail_invoice')
                ->select(
                    'detail_invoice.id',
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
                    'detail_sales_order.price'
                )
                ->join('transaction.t_detail_delivery_order as detail_delivery_order', 'detail_delivery_order.id', '=', 'detail_invoice.detail_delivery_order_id')
                ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('detail_invoice.invoice_id', $id)
                ->get();

        return view('transaction.finance.invoices.edit', compact('invoice', 'shipmentList', 'detailInvoice'));
    }

    public function saveDetail(Request $request) {

        $deliveyOrderDetail = DB::table('transaction.t_detail_delivery_order as detail_delivery_order')
                            ->where('detail_delivery_order.delivery_order_id', $request->delivery_order_id)
                            ->get();

        foreach($deliveyOrderDetail as $item) {
            DB::table('transaction.t_detail_invoice')->insert([
                "detail_delivery_order_id" => $item->id,
                "invoice_id" => $request->invoice_id,
                "created_at" => date('Y-m-d H:i:s'),
                "created_by" => Auth::user()->name
            ]);
        }

        return redirect()->back();
    }

    public function deleteDetail($id) {
        DB::table('transaction.t_detail_invoice as detail_invoice')->where('id', $id)->delete();
        return redirect()->back();
    }

    public function print($id) {

        $invoice = DB::table('transaction.t_invoice as invoice')
                ->select('invoice.id', 'invoice.invoice_no', 'invoice.date', 'sales_order.id as sales_order_id', 'sales_order.tax_type','sales_order.ref_po_customer', 'customer.name as customer_name','customer.address')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'invoice.sales_order_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->where('invoice.id', $id)
                ->first();

        $detailInvoice = DB::table('transaction.t_detail_invoice as detail_invoice')
                ->select(
                    'detail_invoice.id',
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
                    'detail_sales_order.price',
                    DB::raw("detail_sales_order.price * detail_delivery_order.quantity as total_price")
                )
                ->join('transaction.t_detail_delivery_order as detail_delivery_order', 'detail_delivery_order.id', '=', 'detail_invoice.detail_delivery_order_id')
                ->join('transaction.t_detail_sales_order as detail_sales_order', 'detail_sales_order.id', '=', 'detail_delivery_order.detail_sales_order_id')
                ->join('master.m_goods as goods', 'goods.id', '=', 'detail_sales_order.goods_id')
                ->where('detail_invoice.invoice_id', $id)
                ->get();

        $subtotal = number_format($detailInvoice->sum('total_price'), 2, ',', '.');
        
        if($invoice->tax_type == 2) {
            $tax = 0;
        } else {
            $tax = $detailInvoice->sum('total_price') * 0.11;
        }

        $total_amount = $detailInvoice->sum('total_price') + $tax;

        if($invoice->tax_type == 1) {
            $pdf = PDF::loadView('transaction.finance.invoices.print.invoice-v2', [
                'invoice' => $invoice,
                'detailInvoice' => $detailInvoice,
                'sub_total' => $subtotal,
                'tax' => $tax,
                'total_amount' => $total_amount
            ]);
        } else {
            $pdf = PDF::loadView('transaction.finance.invoices.print.invoice-v1', [
                'invoice' => $invoice,
                'detailInvoice' => $detailInvoice,
                'sub_total' => $subtotal,
                'tax' => number_format($tax, 2, ',', '.'),
                'total_amount' => $total_amount
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
        return $pdf->stream($invoice->invoice_no.'.pdf');
    }
}
