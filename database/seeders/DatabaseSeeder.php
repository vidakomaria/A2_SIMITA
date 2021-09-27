<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Item;
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


        Item::factory(10)->create();

        Category::create([
            'nama_kategori' => 'Pupuk'
        ]);
        Category::create([
            'nama_kategori' => 'Benih'
        ]);
        Category::create([
            'nama_kategori' => 'Obat'
        ]);
    }
}
