<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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
        // $databarang = DB::table('barang')->select('*')->get();
        $databarang = DB::table('barang')
                ->whereNotExists(function ($query){
                    $query->select(DB::raw(1))
                          ->from('lelang')
                          ->whereRaw('lelang.id_barang = barang.id_barang');
                })
                ->select('*')
                ->get();

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
        Barang::findOrFail($request->id_barang)->update([
            'status_barang' => 'dilelang'
        ]);

        Lelang::create([
            'id_barang' => $request->id_barang,
            'tgl_lelang' => Carbon::now(),
            'tgl_akhir' => $request->tgl_akhir,
            'id_petugas' => auth()->user()->id,
            'id_pengguna' => $request->id_pengguna,
            'harga_akhir' => $request->harga_akhir,
            'read' => 0
        ]);

        Alert::success('Success', 'Barang berhasil dilelang');
        return redirect('/lelang');
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

        $history = DB::table('history')->leftJoin('users', 'history.id_pengguna', 'users.id')
            ->select('users.*', 'history.*')
            ->where('history.id_lelang', '=', $id)
            ->orderBy('history.penawaran_harga', 'DESC')
            ->get();

        return view('lelang.detail', compact('detail', 'history'));
    }

    public function destroy($id) {
        $lelang = Lelang::find($id);
        $history = History::where('id_lelang', $id)->get();

        if($history->count() > 0){
            // Jika ada user yang menawar lelang, Pesan error ditampilkan ke halaman sebelumnya
            Alert::warning('Peringatan', 'Lelang telah ada yang menawar, tidak dapat dhapus!!');
            return redirect()->back();
        } else {
            // Jika tidak ada akan dihapus
            $lelang->delete();

            Alert::success('Success', 'Lelang berhasil dihapus');
            return redirect('lelang');
        }
    }
}
