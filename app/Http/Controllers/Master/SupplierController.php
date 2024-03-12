<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class SupplierController extends Controller
{
    public function index() {
        $data = DB::table('master.m_supplier')->orderBy('id')->paginate(10);
        return view('master.supplier.index', compact('data'));
    }

    public function save(Request $request) {
        $data = DB::table('master.m_supplier')->insert([
            "code" => $request->code,
            "name" => $request->name,
            "address" => $request->address,
            "phone_number" => $request->phone_number,
            "pic" => $request->pic,
            "tax_type" => $request->tax_type,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);
        return redirect()->route('supplier.index');
    }

    public function edit($id) {
        $data = DB::table('master.m_supplier')->where('id', $id)->first();
        return view('master.supplier.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = DB::table('master.m_supplier')->where('id', $request->id)->update([
            "code" => $request->code,
            "name" => $request->name,
            "address" => $request->address,
            "phone_number" => $request->phone_number,
            "pic" => $request->pic,
            "tax_type" => $request->tax_type,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('supplier.index');
    }

    public function delete($id) {
        $data = DB::table('master.m_supplier')->where('id', $id)->delete();
        return redirect()->route('supplier.index');
    }
}
