<?php

namespace App\Providers;

use App\Models\History;
use App\Models\Lelang;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');

        view()->composer('*', function ($view) {
            if (Auth::check() && $view->getName() !== 'login') {
                // Mengirim Notifikasi Pemenang
            $user = auth()->user();
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

                // Mengupdate data Pemenang Lelang
                $lelangs = Lelang::all();
                // dd($lelangs);

                foreach($lelangs as $i) {
                    // echo $i;
                    $h1 = DB::table('lelang')->leftJoin('barang', 'lelang.id_barang', 'barang.id_barang')
                        ->leftJoin('users', 'lelang.id_pengguna', 'users.id')
                        ->where('lelang.id_lelang', '=', $i->id_lelang)
                        ->select('*')
                        ->first();

                    $h2 = DB::table('history')->leftJoin('users', 'history.id_pengguna', 'users.id')
                        ->select('users.*', 'history.*')
                        ->where('history.id_lelang', '=', $i->id_lelang)
                        ->orderBy('history.penawaran_harga', 'DESC')
                        ->get();
                        // dd($h2);
                }

                $view->with(compact('notif', 'notif2', 'h1', 'h2'));
            }
        });
    }
}
