<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            // Ambil data yang akan di update
            $lelang = DB::table('lelang')->get();

            // Ambil data penawaran tertinggi di history
            $max = DB::table('history')->leftJoin('users', 'history.id_pengguna', 'users.id')
            ->select('users.*', 'history.*')
            ->where('history.id_lelang', '=', $lelang->id)
            ->orderBy('history.penawaran_harga', 'DESC')
            ->max('penawaran_harga');

            if ($lelang->tgl_akhir <= now()) {
                // dd('test');
                DB::table('history')->where('id_history', $max->id)->update([
                    'status_pemenang' => 'menang'
                ]);

                $cek = DB::table('history')->where('id_history', $lelang->id)->first();

                $id_lelang = $cek->id_lelang;

                DB::table('history')->where('id_lelang', $id_lelang)->where('status_pemenang', 'proses')->update([
                    'status_pemenang' => 'kalah'
                ]);

                $ceklagi = DB::table('history')->where('id_history', $max->id)->first();

                DB::table('lelang')->where('id_lelang', $id_lelang)->update([
                    'harga_akhir' => $ceklagi->penawaran_harga,
                    'id_pengguna' => $ceklagi->id_pengguna,
                    'status' => 'ditutup'
                ]);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
