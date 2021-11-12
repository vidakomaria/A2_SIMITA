<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForecastingDesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasting_des', function (Blueprint $table) {
            $table->id();
            $table->date('waktu')->nullable();
            $table->float('Xt', 10, 3)->nullable();
            $table->float('St', 10, 3)->nullable();
            $table->float('St2', 10, 3)->nullable();
            $table->float('a', 10, 3)->nullable();
            $table->float('b', 10, 3)->nullable();
            $table->float('ft', 10, 3)->nullable();
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
        Schema::dropIfExists('forecasting_des');
    }
}
