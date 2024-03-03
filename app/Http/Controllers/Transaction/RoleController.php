<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class RoleController extends Controller
{
    public function index() {
        $data = DB::table('public.roles')->paginate(10);
        return view('transaction.setting.user-management.roles.index', compact('data'));
    }

    public function save(Request $request) {
        DB::table('public.roles')->insert([
            "name" => $request->name,
            "created_at" => date('Y-m-d H:i:s'),
            "created_by" => Auth::user()->name,
        ]);

        return redirect()->back();
    }
}
