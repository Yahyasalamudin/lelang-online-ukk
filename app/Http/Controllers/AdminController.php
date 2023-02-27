<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::all()->where('role', 'admin')->whereNotIn('username', ['admin']);

        return view('admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'role' => 'admin',
            'deskripsi' => $request->password
        ]);

        Alert::success('Success', 'User berhasil diregistrasi');
        return redirect('admin');
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
        return view('admin.edit', compact('user'));
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
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();

        Alert::success('Success', 'User telah berhasil dihapus!');
        return redirect('admin');
    }

    public function search(Request $request)
    {
        $users = User::where('role', 'admin')
                    ->whereNotIn('username', ['admin'])
                    ->get();

        if($request->keyword != ''){
            $users = User::where('username','LIKE','%'.$request->keyword.'%')
                    ->whereNotIn('username', ['admin'])
                    ->where('role', 'admin')->get();
        }

        return response()->json([
            'users' => $users
        ]);
    }
}
