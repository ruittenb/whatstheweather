<?php

namespace App\Console\Commands;

use App\Clients\WeatherClient;
use Exception;
use Illuminate\Console\Command;

class GetCityWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get and store the weather for a specified city';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            $client = new WeatherClient();
            $cities = config('weather.cities');
            $city = $this->argument('city');
            if (!array_key_exists($city, $cities)) {
                throw new Exception("City unknown: ${city}");
            }
        } catch (Exception $e) {
            // Probably a misconfiguration in config/weather.php ?
            // Log the error?
            return Command::FAILURE;
        }
        try {
            $client->getForecast($city)->save();
        } catch (Exception) {
            // If we arrive here, it's probably due to a server problem.
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }
}
