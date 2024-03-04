<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class InvoiceController extends Controller
{
    public function index() {
        $references = DB::table('transaction.t_delivery_order as delivery_order')
                    ->select('delivery_order.id', 'delivery_order.travel_permit_no as ref', 'sales_order.ref_po_customer')
                    ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                    ->whereIn('sales_order.tax_type', [0, 1])
                    ->get();

        $data = DB::table('transaction.t_invoice as invoice')
                ->select('invoice.id', 'invoice.invoice_no', 'invoice.date', 'delivery_order.travel_permit_no','sales_order.ref_po_customer', 'customer.name as customer_name')
                ->join('transaction.t_delivery_order as delivery_order', 'delivery_order.id', '=', 'invoice.delivery_order_id')
                ->join('transaction.t_sales_order as sales_order', 'sales_order.id', '=', 'delivery_order.sales_order_id')
                ->join('master.m_customer as customer', 'customer.id', '=', 'sales_order.customer_id')
                ->get();

        return view('transaction.finance.invoices.index', compact('references', 'data'));
    }

    public function save(Request $request) {
        DB::table('transaction.t_invoice')->insert([
            "invoice_no" => DB::select("SELECT transaction.generate_invoice_number() as inv_no")[0]->inv_no,
            "delivery_order_id" => $request->delivery_order_id,
            "date" => $request->date,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name
        ]);

        return redirect()->back();
    }

    public function edit() {

    }

    public function print() {

    }
}