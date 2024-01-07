<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function index() {
        $data = DB::table('master.m_customer')->orderBy('id')->get();
        return view('master.customer.index', compact('data'));
    }

    public function save(Request $request) {
        $data = DB::table('master.m_customer')->insert([
            "code" => $request->code,
            "name" => $request->name,
            "address" => $request->address,
            "phone_number" => $request->phone_number,
            "pic" => $request->pic,
            "tax_type" => $request->tax_type,
            "customer_type" => $request->customer_type,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);
        return redirect()->route('customer.index');
    }

    public function edit($id) {
        $data = DB::table('master.m_customer')->where('id', $id)->first();
        return view('master.customer.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = DB::table('master.m_customer')->where('id', $id)->update([
            "code" => $request->code,
            "name" => $request->name,
            "address" => $request->address,
            "phone_number" => $request->phone_number,
            "pic" => $request->pic,
            "tax_type" => $request->tax_type,
            "customer_type" => $request->customer_type,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('customer.index');
    }

    public function delete($id) {
        $data = DB::table('master.m_customer')->where('id', $id)->delete();
        return redirect()->route('customer.index');
    }
}
