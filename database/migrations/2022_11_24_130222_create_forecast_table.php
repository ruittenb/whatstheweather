<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->float('longitude')->nullable();
            $table->float('latitude')->nullable();
            $table->float('temperature')->nullable(); // in °C
            $table->integer('wind_force')->nullable(); // in Bft
            $table->string('wind_direction'); // compass direction
            $table->string('kind'); // kind of weather
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
        Schema::dropIfExists('forecasts');
    }
};
