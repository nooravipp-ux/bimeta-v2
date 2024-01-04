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
}
