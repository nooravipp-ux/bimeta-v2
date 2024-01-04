<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class MaterialController extends Controller
{
    public function index() {
        $data = DB::table('master.m_material')->orderBy('id')->get();
        return view('master.material.index', compact('data'));
    }
}
