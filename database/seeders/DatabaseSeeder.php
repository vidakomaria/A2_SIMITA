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
            'username'=>'Admin',
            'password'=>bcrypt('admin123'),
            'name'=>'Nama Karyawan',
            'kategori_user'=>'karyawan',
            'email'=>'karyawan@gmail.com'
        ]);

        User::create([
            'username'=>'Owner',
            'password'=>bcrypt('owner123'),
            'name'=>'Nama Pemilik',
            'kategori_user'=>'pemilik',
            'email'=>'pemilik@gmail.com'
        ]);


        Item::factory(10)->create();

        Category::create([
            'name' => 'Pupuk'
        ]);
        Category::create([
            'name' => 'Benih'
        ]);
        Category::create([
            'name' => 'Obat'
        ]);
    }
}
