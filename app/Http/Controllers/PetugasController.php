<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::all()->where('role', 'petugas');
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
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
            'username' => 'required|string|max:255|regex:/^[A-Za-z0-9_]+$/|unique:users',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'password' => 'required|string|min:4',
            'password_konfirmasi' => 'required|same:password|min:4'
            ],
            [
                'regex' => 'Username tidak boleh mengandung spasi.'
            ]
        );

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
            'password_konfirmasi' => $request->password_konfirmasi,
            'role' => 'petugas',
            'deskripsi' => $request->password
        ]);

        Alert::success('Success', 'User berhasil diregistrasi');
        return redirect('petugas');
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
        return view('petugas.edit', compact('user'));
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
        return redirect('petugas');
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
        $lelang = Lelang::where('id_petugas', $id)->get();

        if ($lelang->count() > 0) {
            Alert::warning('Peringatan', 'Petugas telah membuka lelang, tidak dapat dihapus!');
            return redirect()->back();
        } else {
            $user->delete();

            Alert::success('Success', 'User telah berhasil dihapus!');
            return redirect('petugas');
        }
    }
}
