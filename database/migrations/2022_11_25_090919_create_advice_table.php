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
        Schema::create('advices', function (Blueprint $table) {
            $table->id();

            $table->integer('sort_order');
            $table->float('temperature_min')->nullable(); // in °C
            $table->float('temperature_max')->nullable(); // in °C
            $table->integer('wind_force_min')->nullable(); // in Bft
            $table->integer('wind_force_max')->nullable(); // in Bft
            $table->string('description'); // weather advice

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
        // TODO do this in separate migration where data is accurately migrated
        //Schema::table('forecasts', function (Blueprint $table) {
        //    $table->dropColumn('advice_id');
        //    $table->string('kind');
        //});
        Schema::dropIfExists('advices');
    }
};
