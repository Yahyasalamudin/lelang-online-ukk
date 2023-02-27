<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lelang;
// use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Carbon;
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

        $user = auth()->user();
        $notif = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_pengguna', '=', $user->id)
            ->where('read', '=', 0)
            ->select('*')
            ->count();
        $notif2 = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_pengguna', '=', $user->id)
            ->where('read', '=', 0)
            ->select('*')
            ->get();

        return view('dashboard', compact('count1', 'count2', 'count3', 'lelang', 'lelang1', 'notif', 'notif2'));
    }

    public function historyLelang() {
        $user_id = auth()->id();
        $history = History::where('id_pengguna', $user_id)
                ->join('barang', 'history.id_barang', 'barang.id_barang')
                ->orderBy('history.created_at', 'DESC')
                ->get();
        $lelangs = Lelang::all();

        $user = auth()->user();
        $notif = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_pengguna', '=', $user->id)
            ->where('read', '=', 0)
            ->select('*')
            ->count();
        $notif2 = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_pengguna', '=', $user->id)
            ->where('read', '=', 0)
            ->select('*')
            ->get();

        return view('pengguna.history', compact('history', 'lelangs', 'notif', 'notif2'));
    }

    public function show($id) {
        // dd($id);
        $detail = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_lelang', '=', $id)
            ->select('*')
            ->first();

        $user = auth()->user();
        $notif = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_pengguna', '=', $user->id)
            ->where('read', '=', 0)
            ->select('*')
            ->count();
        $notif2 = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_pengguna', '=', $user->id)
            ->where('read', '=', 0)
            ->select('*')
            ->get();

        return view('pengguna.winner-detail', compact('detail', 'notif', 'notif2'));
    }

    public function update($id) {
        Lelang::find($id)->update([
            'read' => 1
        ]);

        return redirect('winner/lelang');
    }
}
