<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index() {
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
