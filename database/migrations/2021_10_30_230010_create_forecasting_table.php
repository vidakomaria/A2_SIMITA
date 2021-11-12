<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasting', function (Blueprint $table) {
            $table->id();
            $table->float('yt')->nullable();
            $table->date('waktu')->nullable();
            $table->float('Mt',8,3)->nullable();
            $table->float("M't",8,3)->nullable();
            $table->float('a',8,3)->nullable();
            $table->float('b',8,3)->nullable();
            $table->float('Ft',8,3)->nullable();
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
        Schema::dropIfExists('forecasting');
    }
}
