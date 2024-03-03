<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UserManagementController extends Controller
{
    public function index() {
        $roles = DB::table('public.roles')->get();
        $data = DB::table('public.users as user')
                ->select(
                    'user.name as user_name',
                    'user.email',
                    'user.last_login',
                    'role.name as role_name',
                    // DB::raw("CASE WHEN user.status = '1' THEN 'Aktif' ELSE 'Non Aktif' END AS status")
                    'user.status'
                )
                ->leftJoin('public.roles as role', 'role.id', '=', 'user.role_id')
                ->orderBy('user.created_at', 'ASC')
                ->paginate(10);
        return view('transaction.setting.user-management.users.index', compact('data', 'roles'));
    }


}
