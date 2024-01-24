<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RawMaterialController extends Controller
{
    public function index() {
        return view('transaction.warehouse.raw-material.index');
    }
}
