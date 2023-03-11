<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Lelang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::orderByDESC('id_barang')->get();
        // dd($barangs);
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'       => 'required',
            'gambar'            => 'required',
            'harga_awal'        => 'required',
            'deskripsi_barang'  => 'required',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/image/barang', $gambar->hashName());

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'gambar' => $gambar->hashName(),
            'tgl_daftar' => Carbon::now(),
            'harga_awal' => $request->harga_awal,
            'deskripsi_barang' => $request->deskripsi_barang,
            'status_barang' => 'belum',
        ]);

        // $save->save();
        Alert::success('Success', 'Barang berhasil ditambahkan');
        return redirect('barang');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangs = Barang::find($id);
        $lelang = Lelang::where('id_barang', $id)->get();

        if($lelang->count() > 0){
            // Jika ada lelang yang menggunakan barang, Pesan error ditampilkan ke halaman sebelumnya
            Alert::warning('Peringatan', 'Produk telah di lelang, tidak dapat diedit!!');
            return redirect()->back();
        } else {
            return view('barang.edit', compact('barangs'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang'       => 'required',
            'harga_awal'        => 'required',
            'deskripsi_barang'  => 'required'
        ]);

        $barang = Barang::findOrFail($id);

        if($request->file('gambar') == "") {
            // dd('test');
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'harga_awal'   => $request->harga_awal,
                'deskripsi_barang'   => $request->deskripsi_barang
            ]);
        } else {
            //hapus old image
            Storage::disk('local')->delete('public/image/barang/' . $barang->gambar);

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/image/barang', $gambar->hashName());

            // dd($gambar);
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'gambar' => $gambar->hashName(),
                'harga_awal' => $request->harga_awal,
                'deskripsi_barang' => $request->deskripsi_barang
            ]);
        }

        Alert::success('Success', 'Barang berhasil diupdate');
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $lelang = Lelang::where('id_barang', $id)->get();

        if($lelang->count() > 0){
            // Jika ada lelang yang menggunakan barang, Pesan error ditampilkan ke halaman sebelumnya
            Alert::warning('Peringatan', 'Produk telah di lelang, tidak dapat dihapus!!');
            return redirect()->back();
        } else {
            // Jika barang belum di lelang, maka barang akan dihapus
            Storage::disk('local')->delete('public/image/barang/' . $barang->gambar);
            $barang->delete();

            Alert::success('Success', 'Data barang berhasil dihapus');
            return redirect('barang');
        }
    }
}
