<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama_kategori' => 'benih bibit tanaman'
        ]);
        Kategori::create([
            'nama_kategori' => 'pupuk'
        ]);
        Kategori::create([
            'nama_kategori' => 'pest control'
        ]);
    }
}
