<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubstanceController extends Controller
{
    public function index() {
        $data = DB::table('master.m_substance')->orderBy('id')->get();
        return view('master.substance.index', compact('data'));
    }

    public function save(Request $request) {
        $data = DB::table('master.m_substance')->insert([
            "code" => $request->code,
            "substance" => $request->substance,
            "cor_code" => $request->cor_code,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);
        return redirect()->route('substance.index');
    }

    public function edit($id) {
        $data = DB::table('master.m_substance')->where('id', $id)->first();
        return view('master.substance.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = DB::table('master.m_substance')->where('id', $id)->update([
            "code" => $request->code,
            "substance" => $request->substance,
            "cor_code" => $request->cor_code,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('substance.index');
    }

    public function delete($id) {
        $data = DB::table('master.m_substance')->where('id', $id)->delete();
        return redirect()->route('substance.index');
    }
}
