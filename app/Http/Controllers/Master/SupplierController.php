<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    public function index() {
        $data = DB::table('master.m_supplier')->orderBy('id')->get();
        return view('master.supplier.index', compact('data'));
    }
}
