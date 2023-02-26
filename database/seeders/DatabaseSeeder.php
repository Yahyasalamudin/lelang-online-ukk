<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(25)->create();

        User::insert([
            'nama' => 'admin',
            'no_hp' => '081345678901',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        User::insert([
            'nama' => 'petugas',
            'no_hp' => '081123456789',
            'username' => 'petugas',
            'password' => Hash::make('petugas'),
            'role' => 'petugas',
            'deskripsi' => 'petugas'
        ]);

        User::insert([
            'nama' => 'Yahya',
            'no_hp' => '081345678901',
            'username' => 'yahya',
            'password' => Hash::make('pengguna'),
            'role' => 'pengguna',
            'deskripsi' => 'pengguna'
        ]);

        User::insert([
            'nama' => 'Dwi Khusnul',
            'no_hp' => '081345678901',
            'username' => 'dwikhusnul',
            'password' => Hash::make('dwikhusnul'),
            'role' => 'pengguna',
            'deskripsi' => 'dwikhusnul'
        ]);
        User::insert([
            'nama' => 'Jokowi',
            'no_hp' => '081345678901',
            'username' => 'jokowi',
            'password' => Hash::make('jokowi'),
            'role' => 'pengguna',
            'deskripsi' => 'jokowi'
        ]);
        User::insert([
            'nama' => 'Puan',
            'no_hp' => '081345678901',
            'username' => 'puan',
            'password' => Hash::make('puan'),
            'role' => 'pengguna',
            'deskripsi' => 'puan'
        ]);
    }
}
