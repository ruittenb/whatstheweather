<?php

namespace App\Console\Commands;

use App\Models\Advice;
use App\Models\Forecast;
use Illuminate\Console\Command;

class DebugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:debug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the commands in Console\\Commands\\DebugCommand';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \DB::enableQueryLog();
        //$data = Advice::where('sort_order', Advice::NO_ADVICE)->get();
        //$data = Forecast::where('city', 'Paramaribo')->get();

        // $data = new Forecast([
        //     'city' => 'Amsterdam',
        //     'longitude' => 3,
        //     'latitude' => 52,
        //     'temperature' => 25,
        //     'wind_force' => 5,
        //     'wind_direction' => 'SSW',
        // ]);
        // echo "Advice: direct:{$data->advice_id} indirect: {$data->advice->id}: {$data->advice->description}\n";
        $forecast = Forecast::find(228);
        $data = $forecast->toArray();
        dd(\DB::getQueryLog());
        var_dump($data);
        return Command::SUCCESS;
    }
}
