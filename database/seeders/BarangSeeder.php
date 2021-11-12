<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\BarangDijual;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'id_barang'     =>112345,
            'nama_barang'   =>'Benih Melon Alisha',
            'harga_jual'    =>555000,
            'harga_beli'    =>475000,
            'stok'          =>90,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>218970,
            'nama_barang'   =>'Benih Melon Alina F1',
            'harga_jual'    =>178000,
            'harga_beli'    =>150000,
            'stok'          =>300,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>435897,
            'nama_barang'   =>'Benih Cabai Rawit DEWATA 43 F1',
            'harga_jual'    =>69000,
            'harga_beli'    =>55000,
            'stok'          =>570,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>238765,
            'nama_barang'   =>'ANFUSH 500 Gram Pupuk Pengendali Hayati Patogen Tanah',
            'harga_jual'    =>32000,
            'harga_beli'    =>27000,
            'stok'          =>700,
            'id_kategori'   =>2,
        ]);
        Barang::create([
            'id_barang'     =>1456298,
            'nama_barang'   =>'PETROGENOL 800 L Atraktan Obat Lalat Buah',
            'harga_jual'    =>5000,
            'harga_beli'    =>3500,
            'stok'          =>400,
            'id_kategori'   =>3,
        ]);
        Barang::create([
            'id_barang'     =>387598,
            'nama_barang'   =>'SPREADER DGW Perekat Perata Penembus 500ML',
            'harga_jual'    =>57800,
            'harga_beli'    =>43000,
            'stok'          =>385,
            'id_kategori'   =>2,
        ]);
        Barang::create([
            'id_barang'     =>129873,
            'nama_barang'   =>'Benih Semangka Amara F1',
            'harga_jual'    =>165000,
            'harga_beli'    =>150000,
            'stok'          =>200,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>432676,
            'nama_barang'   =>'Benih Sawi Pahit MAJAPAHIT 25GRAM',
            'harga_jual'    =>15000,
            'harga_beli'    =>13000,
            'stok'          =>250,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>563752,
            'nama_barang'   =>'Benih Kacang Panjang Parade Tavi 200 Butir',
            'harga_jual'    =>10000,
            'harga_beli'    =>9000,
            'stok'          =>450,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>837901,
            'nama_barang'   =>'Benih Kangkung BANGKOK LP-1',
            'harga_jual'    =>11000,
            'harga_beli'    =>9500,
            'stok'          =>480,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>598713,
            'nama_barang'   =>'Benih Tomat KARUNA 10 Gram',
            'harga_jual'    =>11000,
            'harga_beli'    =>9500,
            'stok'          =>500,
            'id_kategori'   =>1,
        ]);
        Barang::create([
            'id_barang'     =>687596,
            'nama_barang'   =>'Benih Selada Hijau GRAND RAPIDS',
            'harga_jual'    =>25000,
            'harga_beli'    =>22500,
            'stok'          =>380,
            'id_kategori'   =>1,
        ]);

        //Barang Dijual//

        BarangDijual::create([
            'id_barang'     =>112345,
            'nama_barang'   =>'Benih Melon Alisha',
            'harga_jual'    =>555000,
            'harga_beli'    =>475000,
            'stok'          =>90,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>218970,
            'nama_barang'   =>'Benih Melon Alina F1',
            'harga_jual'    =>178000,
            'harga_beli'    =>150000,
            'stok'          =>300,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>435897,
            'nama_barang'   =>'Benih Cabai Rawit DEWATA 43 F1',
            'harga_jual'    =>69000,
            'harga_beli'    =>55000,
            'stok'          =>570,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>238765,
            'nama_barang'   =>'ANFUSH 500 Gram Pupuk Pengendali Hayati Patogen Tanah',
            'harga_jual'    =>32000,
            'harga_beli'    =>27000,
            'stok'          =>700,
            'id_kategori'   =>2,
        ]);
        BarangDijual::create([
            'id_barang'     =>1456298,
            'nama_barang'   =>'PETROGENOL 800 L Atraktan Obat Lalat Buah',
            'harga_jual'    =>5000,
            'harga_beli'    =>3500,
            'stok'          =>400,
            'id_kategori'   =>3,
        ]);
        BarangDijual::create([
            'id_barang'     =>387598,
            'nama_barang'   =>'SPREADER DGW Perekat Perata Penembus 500ML',
            'harga_jual'    =>57800,
            'harga_beli'    =>43000,
            'stok'          =>385,
            'id_kategori'   =>2,
        ]);
        BarangDijual::create([
            'id_barang'     =>129873,
            'nama_barang'   =>'Benih Semangka Amara F1',
            'harga_jual'    =>165000,
            'harga_beli'    =>150000,
            'stok'          =>200,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>432676,
            'nama_barang'   =>'Benih Sawi Pahit MAJAPAHIT 25GRAM',
            'harga_jual'    =>15000,
            'harga_beli'    =>13000,
            'stok'          =>250,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>563752,
            'nama_barang'   =>'Benih Kacang Panjang Parade Tavi 200 Butir',
            'harga_jual'    =>10000,
            'harga_beli'    =>9000,
            'stok'          =>450,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>837901,
            'nama_barang'   =>'Benih Kangkung BANGKOK LP-1',
            'harga_jual'    =>11000,
            'harga_beli'    =>9500,
            'stok'          =>480,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>598713,
            'nama_barang'   =>'Benih Tomat KARUNA 10 Gram',
            'harga_jual'    =>11000,
            'harga_beli'    =>9500,
            'stok'          =>500,
            'id_kategori'   =>1,
        ]);
        BarangDijual::create([
            'id_barang'     =>687596,
            'nama_barang'   =>'Benih Selada Hijau GRAND RAPIDS',
            'harga_jual'    =>25000,
            'harga_beli'    =>22500,
            'stok'          =>380,
            'id_kategori'   =>1,
        ]);
    }
}
