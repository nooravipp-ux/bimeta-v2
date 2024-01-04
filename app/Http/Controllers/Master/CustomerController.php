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
}
