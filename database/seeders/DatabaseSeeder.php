<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         \App\Models\User::factory(10)->create();

        User::create([
            'nama'=>'Nama Karyawan',
            'username'=>'Admin',
            'password'=>bcrypt('admin123'),
            'role'=>'karyawan',
//            'email'=>'karyawan@gmail.com'
        ]);

        User::create([
            'nama'=>'Nama Pemilik UD Mitra Tani',
            'username'=>'Pemilik',
            'password'=>bcrypt('owner123'),
            'role'=>'pemilik',
//            'email'=>'pemilik@gmail.com'
        ]);



        Kategori::create([
            'nama_kategori' => 'Pupuk'
        ]);
        Kategori::create([
            'nama_kategori' => 'Benih'
        ]);
        Kategori::create([
            'nama_kategori' => 'Obat'
        ]);

        Barang::factory(10)->create();
    }
}
