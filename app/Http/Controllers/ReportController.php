<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index() {
        return view('cetak-laporan');
    }

    public function cetaklelang() {
        return view('tanggal-lelang');
    }

    public function report(Request $request, $id)
    {
        $detaild = Lelang::join('users', 'lelang.id_petugas', 'users.id')
            ->select('*')
            ->get();

        $historyd = DB::table('history')->where('history.id_lelang', '=', $id)
            ->join('lelang', 'history.id_lelang', 'lelang.id_lelang')
            ->join('barang', 'lelang.id_barang', 'barang.id_barang')
            ->join('users', 'history.id_pengguna', 'users.id')
            ->select('*')
            ->orderByDesc('history.penawaran_harga')
            ->get();

        $pdf = Pdf::loadView('report', compact('historyd', 'detaild'));
        return $pdf->stream();
    }

    public function cetakadmin() {
        $user = User::all()->where('role', 'admin')->whereNotIn('username', ['admin']);
        $title = "Admin";

        $pdf = Pdf::loadView('report-user', compact('user', 'title'));
        return $pdf->stream();
    }

    public function cetakpetugas() {
        $user = User::all()->where('role', 'petugas');
        $title = "Petugas";

        $pdf = Pdf::loadView('report-user', compact('user', 'title'));
        return $pdf->stream();
    }

    public function cetakpengguna() {
        $user = User::all()->where('role', 'pengguna');

        $pdf = Pdf::loadView('report-pengguna', compact('user'));
        return $pdf->stream();
    }

    public function reportTgl(Request $request) {
        $tgl_awal = $request->tgl_awal;
        $tgl_akhir = $request->tgl_akhir;

        $data = Lelang::whereBetween('tgl_lelang', [$tgl_awal, $tgl_akhir])->where('status', 'ditutup')
            ->join('barang', 'lelang.id_barang', 'barang.id_barang')
            ->join('users', 'lelang.id_pengguna', 'users.id')
            ->get();

        $pdf = Pdf::loadView('report-lelang', compact('data', 'tgl_awal', 'tgl_akhir'));
        return $pdf->stream();
    }

    public function reportPemenang(Request $request, $id)
    {
        $detail = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_lelang', '=', $id)
            ->select('*')
            ->first();

        $pdf = Pdf::loadView('report-win', compact('detail'));
        return $pdf->stream();
    }
}
