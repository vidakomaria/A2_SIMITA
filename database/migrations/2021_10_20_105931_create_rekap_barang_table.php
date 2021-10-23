<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_barang', function (Blueprint $table) {
            $table->id('id_rekap_barang');
            $table->timestamp('tgl');
            $table->foreignId('id_barang')->constrained('barang','id_barang');
            $table->integer('barang_masuk');
            $table->foreignId('id_admin')->constrained('users','id');
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
        Schema::dropIfExists('rekap_barang');
    }
}
