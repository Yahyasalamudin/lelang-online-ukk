<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function register() {
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('auth.register');
        }
    }

    public function actionRegister(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|numeric|digits_between:10,13',
            'username' => 'required|string|max:255|regex:/^[A-Za-z0-9_]+$/|unique:users',
            'password' => 'required|string|min:4',
            'password_konfirmasi' => 'required|same:password|min:4',
            'g-recaptcha-response' => 'recaptcha',
            ],
            [
                'regex' => 'Username tidak boleh mengandung spasi.'
            ]
        );

        User::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'password_konfirmasi' => $request->password_konfirmasi,
            'role' => 'pengguna',
            'deskripsi' => $request->password,
            'g-recaptcha-response' => $request->input('required|captcha')
        ]);

        Alert::success('Success', 'Akun berhasil diregistrasi, silakan login!!');
        return redirect('/login');
    }

    public function editProfile($id) {
        $user = User::findOrFail($id);

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

        return view('profile/edit-profile', compact('user', 'notif', 'notif2'));
    }

    public function updateProfile(Request $request, $id) {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
        ]);

        User::find($id)->update([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
        ]);

        Alert::success('Success', 'Berhasil mengedit data');
        return redirect()->back();
    }

    public function editPassword($id) {
        $user = User::findOrFail($id);

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

        return view('profile/edit-password', compact('user', 'notif', 'notif2'));
    }

    public function updatePassword(Request $request, $id) {
        $user = auth()->user();

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password tidak cocok!']);
        }

        User::find($id)->update([
            'current_password' => $request->current_password,
            'password' => Hash::make($request->password),
            'confirm_password' => $request->confirm_password,
            'deskripsi' => $request->password,
        ]);

        Alert::success('Success', 'Password berhasil diedit');
        return redirect()->back();
    }
}
