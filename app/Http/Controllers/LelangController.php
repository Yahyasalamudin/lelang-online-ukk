<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lelang;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelangs = Lelang::all();
        return view('lelang.index', compact('lelangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $databarang = DB::table('barang')->select('*')->get();

        return view('lelang.create', compact('databarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = DB::table('lelang')
            ->where('lelang.id_barang', $request->id_barang)
            ->where('status', 'dibuka')
            ->join('barang', 'lelang.id_barang', '=', 'barang.id_barang')
            ->get();

        $cek2 = count($cek);

        if ($cek2 == 1) {
            return redirect()->back();
        } else {
            Lelang::create([
                'id_barang' => $request->id_barang,
                'tgl_lelang' => Carbon::now(),
                'tgl_akhir' => $request->tgl_akhir,
                'id_petugas' => auth()->user()->id,
                'id_pengguna' => $request->id_pengguna,
                'harga_akhir' => $request->harga_akhir,
            ]);

            Alert::success('Success', 'Barang berhasil dilelang');
            return redirect('/lelang');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_lelang', '=', $id)
            ->select('*')
            ->first();

        $id1 = $detail->id_barang;

        $history = DB::table('history')->leftJoin('users', 'history.id_pengguna', 'users.id')
            ->select('users.*', 'history.*')
            ->where('history.id_lelang', '=', $id)
            ->orderBy('history.penawaran_harga', 'DESC')
            ->get();

        $max = History::max('penawaran_harga');
        $ha = DB::table('history')->leftJoin('users', 'history.id_pengguna', 'users.id')
            ->select('users.*', 'history.*')
            ->where('history.id_lelang', '=', $id)
            ->where('penawaran_harga', $max)
            ->orderBy('history.penawaran_harga', 'DESC')
            ->get();

        $u  =  DB::table('users')->first();
        // dd($u);
        // return response()->json(['data'=>$detail, $barang]);
        // dd($detail);
        return view('lelang.detail', compact('detail', 'history', 'ha', 'u' ));
    }

    // public function show2($id) {
    //     $detail = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
    //         ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
    //         ->where('lelang.id_lelang', '=', $id)
    //         ->select('*')
    //         ->first();

    //     $max = History::max('penawaran_harga');

    //     $ha = DB::table('history')->leftJoin('users', 'history.id_pengguna', 'users.id')
    //         ->select('users.*', 'history.*')
    //         ->where('history.id_lelang', '=', $id)
    //         ->where('penawaran_harga', $max)
    //         ->orderBy('history.penawaran_harga', 'DESC')
    //         ->get();

    //     return view('lelang.detail', compact('ha', 'detail'));
    // }
}
