<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class MaterialController extends Controller
{
    public function index() {
        $data = DB::table('master.m_material')->orderBy('id')->paginate(20);
        return view('master.material.index', compact('data'));
    }

    public function save(Request $request) {
        $data = DB::table('master.m_material')->insert([
            "code" => $request->code,
            "name" => $request->name,
            "type" => $request->type,
            "paper_type" => $request->paper_type,
            "gramature" => $request->gramature,
            "unit" => $request->unit,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);
        return redirect()->route('material.index');
    }

    public function edit($id) {
        $data = DB::table('master.m_material')->where('id', $id)->first();
        return view('master.material.edit', compact('data'));
    }

    public function update(Request $request) {
        $data = DB::table('master.m_material')->where('id', $request->id)->update([
            "code" => $request->code,
            "name" => $request->name,
            "type" => $request->type,
            "paper_type" => $request->paper_type,
            "gramature" => $request->gramature,
            "unit" => $request->unit,
            "updated_at" => date('Y-m-d H:i:s'),
            "updated_by" => Auth::user()->name,
        ]);

        return redirect()->route('material.index');
    }

    public function delete($id) {
        $data = DB::table('master.m_material')->where('id', $id)->delete();
        return redirect()->route('material.index');
    }
}
