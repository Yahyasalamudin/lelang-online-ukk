<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Lelang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::all()->where('role', 'pengguna');
        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
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
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'password' => 'required|string|min:4',
            'password_konfirmasi' => 'required|same:password|min:4'
        ]);

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'password_konfirmasi' => $request->password_konfirmasi,
            'role' => 'pengguna',
            'deskripsi' => $request->password
        ]);

        Alert::success('Success', 'User berhasil diregistrasi');
        return redirect('pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pengguna.edit', compact('user'));
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
            'nama' => 'required',
            'no_hp' => 'required',
            'password' => 'required',
        ]);

        User::find($id)->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'deskripsi' => $request->password,
            'role' => $request->role
        ]);

        Alert::success('Success', 'Berhasil mengubah data user');
        return redirect('pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $history = History::where('id_pengguna', $id)->get();

        if ($history->count() > 0) {
            Alert::warning('Peringatan', 'User ini telah melakukan tawaran, tidak dapat dihapus!');
            return redirect()->back();
        } else {
            $user->delete();

            Alert::success('Success', 'User telah berhasil dihapus!');
            return redirect('pengguna');
        }
    }

    public function win() {
        $user = auth()->user();
        $lelang = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
            ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
            ->where('lelang.id_pengguna', '=', $user->id)
            ->select('*')
            ->get();

        return view('pengguna.win-lelang', compact('lelang'));
    }
}
