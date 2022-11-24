<?php

namespace App\Console\Commands;

use App\Clients\WeatherClient;
use Exception;
use Illuminate\Console\Command;

class GetAllWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and store the weather for all configured cities';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            $client = new WeatherClient();
            $throttle_seconds = config('weather.throttle_seconds');
            $cities = array_keys(config('weather.cities')); // no need to sort here, db can sort for us
        } catch (Exception $e) {
            // Probably a misconfiguration in config/weather.php ?
            // Log the error?
            return Command::FAILURE;
        }
        try {
            foreach ($cities as $city) {
                $client->getForecast($city)->save();
                usleep(1000 * $throttle_seconds); // manual throttling
            }
        } catch (Exception) {
            // If we arrive here, it's probably due to a server problem.
            // Abort the entire for loop and try later.
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}
