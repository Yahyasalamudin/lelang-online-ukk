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
            'nama' => 'Admin',
            'no_hp' => '081345678901',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        User::insert([
            'nama' => 'Dwi Khusnul',
            'no_hp' => '081345678901',
            'username' => 'dwikhusnul',
            'password' => Hash::make('dwikhusnul'),
            'role' => 'admin',
            'deskripsi' => 'dwikhusnul'
        ]);

        User::insert([
            'nama' => 'Petugas',
            'no_hp' => '081123456789',
            'username' => 'petugas',
            'password' => Hash::make('petugas'),
            'role' => 'petugas',
            'deskripsi' => 'petugas'
        ]);

        User::insert([
            'nama' => 'Yahya Salamudin',
            'no_hp' => '081345678901',
            'username' => 'yahya',
            'password' => Hash::make('yahya'),
            'role' => 'petugas',
            'deskripsi' => 'yahya'
        ]);

        User::insert([
            'nama' => 'Choirul Huda',
            'no_hp' => '081345678901',
            'username' => 'choirul',
            'password' => Hash::make('choirul'),
            'role' => 'pengguna',
            'deskripsi' => 'choirul'
        ]);

        User::insert([
            'nama' => 'Titis Ariyati',
            'no_hp' => '081345678901',
            'username' => 'titis',
            'password' => Hash::make('titis'),
            'role' => 'pengguna',
            'deskripsi' => 'titis'
        ]);

        User::insert([
            'nama' => 'Sabrina',
            'no_hp' => '081345678901',
            'username' => 'sabrina',
            'password' => Hash::make('sabrina'),
            'role' => 'pengguna',
            'deskripsi' => 'sabrina'
        ]);
    }
}
