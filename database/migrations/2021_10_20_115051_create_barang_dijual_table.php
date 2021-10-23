<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangDijualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_dijual', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang');
            $table->primary('id_barang');

            $table->string('nama_barang');
            $table->integer('harga_jual');
            $table->integer('harga_beli');
            $table->integer('stok');
            $table->foreignId('id_kategori')->constrained('kategori','id_kategori');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_dijual');
    }
}
