<?php

use App\Models\Advice;
use App\Models\Forecast;
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
        echo "\nAdding new column to forecasts...\n";
        Schema::table('forecasts', function (Blueprint $table) {
            $table->unsignedBigInteger('advice_id')->default(Advice::getNoAdviceId());
            $table->foreign('advice_id')
                ->references('id')
                ->on('advices')
                ->restrictOnUpdate()
                ->restrictOnDelete();
        });
        echo "Starting data migration...\n";
        foreach (Forecast::all() as $forecast) {
            $advice = Advice::where('description', $forecast->kind)->first();
            if ($advice) {
                $forecast->advice()->associate($advice);
                $forecast->save();
            }
        }
        echo "Removing old column from forecasts...\n";
        Schema::table('forecasts', function (Blueprint $table) {
            $table->dropColumn('kind');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('forecasts', function (Blueprint $table) {
            $table->string('kind');
        });
        foreach (Forecast::all() as $forecast) {
            $forecast->kind = $forecast->advice->description;
            $forecast->save();
        }
        Schema::table('forecasts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('advice_id');
        });
    }
};
