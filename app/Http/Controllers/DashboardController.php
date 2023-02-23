<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $count1 = DB::table('users')->where('role', 'admin')->count();
        $count2 = DB::table('users')->where('role', 'petugas')->count();
        $count3 = DB::table('users')->where('role', 'pengguna')->count();
        $lelang = DB::table('lelang')->count();
        $lelang1 = Lelang::all();

        return view('dashboard', compact('count1', 'count2', 'count3', 'lelang', 'lelang1'));
    }
}
