<?php

namespace App\Clients;

use App\Adapters\OpenWeatherMapAdapter;
use App\Adapters\TestWeatherAdapter;
use App\Adapters\WeatherAdapter;
use App\Models\Forecast;
use Exception;

class WeatherClient
{
    private WeatherAdapter $adapter;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function __construct(string $maybe_api_name = '')
    {
        $api_name = $maybe_api_name ?: config('weather.api_name');
        $this->setWeatherApi($api_name);
    }

    /**
     * @param string $api_name
     * @return void
     * @throws Exception
     *   When API name is not found in config
     */
    public function setWeatherApi(string $api_name): void
    {
        match ($api_name) {
            'openweathermap' => $this->adapter = new OpenWeatherMapAdapter(),
            'test' => $this->adapter = new TestWeatherAdapter(),
            default => throw new Exception(
                "Unknown weather API '$api_name'"
            ),
        };
    }

    /**
     * Bootstrap any application services.
     *
     * @param string $city
     * @return Forecast
     * @throws Exception
     *   When city is unknown or misconfigured
     */
    public function getForecast(string $city): Forecast
    {
        $params = config('weather.cities');
        if (!array_key_exists($city, $params)) {
            throw new Exception("Unknown city: '$city'");
        }
        $city_coords = $params[$city];
        if (
            !array_key_exists('longitude', $city_coords) ||
            !array_key_exists('latitude', $city_coords)
        ) {
            throw new Exception("Misconfigured city: '$city' must have both 'latitude' and 'longitude'");
        }
        $longitude = $city_coords['longitude'];
        $latitude = $city_coords['latitude'];
        return $this->adapter->getForecast($longitude, $latitude);
    }
}
