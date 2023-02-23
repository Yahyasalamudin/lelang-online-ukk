<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
            'password_konfirmasi' => 'required|same:password|min:4',
        ]);

        User::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'password_konfirmasi' => $request->password_konfirmasi,
            'role' => 'pengguna'
        ]);

        return redirect('/')->with('success', 'Selamat akun anda telah berhasil dibuat, Silahkan login');
    }
}
