<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoriController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $cek = DB::table('lelang')
            ->where('id_lelang', $request->id_lelang)
            ->join('barang', 'lelang.id_barang', '=', 'barang.id_barang')->first();

        if ($request->penawaran_harga <= $cek->harga_awal) {
            return redirect()->back()->with('warning', 'Penawaran harga tidak boleh KURANG atau SAMA DENGAN harga awal!!!');
        } else {
            $save = new History;

            $save->id_lelang = $request->id_lelang;
            $save->id_pengguna = Auth::user()->id;
            $save->id_barang = $id;
            $save->penawaran_harga = $request->penawaran_harga;

            $save->save();
            // return redirect('/lelang');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        DB::table('history')->where('id_history', $id)->update([
            'status_pemenang' => 'menang'
        ]);

        $cek = DB::table('history')->where('id_history', $id)->first();

        $id_lelang = $cek->id_lelang;

        DB::table('history')->where('id_lelang', $id_lelang)->where('status_pemenang', 'proses')->update([
            'status_pemenang' => 'kalah'
        ]);

        $ceklagi = DB::table('history')->where('id_history', $id)->first();

        DB::table('lelang')->where('id_lelang', $id_lelang)->update([
            'harga_akhir' => $ceklagi->penawaran_harga,
            'id_pengguna' => $ceklagi->id_pengguna,
            'status' => 'ditutup'
        ]);

        $detail = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_lelang', '=', $id_lelang)
            ->select('*')
            ->first();

        $history = DB::table('history')->leftJoin('users', 'history.id_pengguna', 'users.id')
            ->select('users.*', 'history.*')
            ->where('history.id_lelang', '=', $id_lelang)
            ->orderBy('history.penawaran_harga', 'DESC')
            ->get();

        return view('lelang.detail', compact('detail', 'history'));
    }
}
