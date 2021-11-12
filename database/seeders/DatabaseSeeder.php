<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\User;
use Database\Factories\BarangFactory;
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
            'nama'=>'Fatimah',
            'username'=>'Admin',
            'password'=>bcrypt('admin123'),
            'role'=>'karyawan',
//            'email'=>'karyawan@gmail.com'
        ]);

        User::create([
            'nama'=>'Bapak Sunardi',
            'username'=>'Pemilik',
            'password'=>bcrypt('owner123'),
            'role'=>'pemilik',
//            'email'=>'pemilik@gmail.com'
        ]);


        $this->call([
            KategoriSeeder::class,
            BarangSeeder::class,
            ]);
    }
}
