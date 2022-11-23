<?php

namespace App\Clients;

use App\Adapters\OpenWeatherMapAdapter;
use App\Adapters\WeatherAdapter;

class WeatherClient
{
    private WeatherAdapter $adapter;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function __construct(string $maybe_weather_api = '')
    {
        $weather_api = $maybe_weather_api ?: config('weather.weather_api');
        $this->setWeatherApi($weather_api);
    }

    /**
     * @param string $weather_api
     * @return void
     */
    public function setWeatherApi(string $weather_api): void
    {
        match ($weather_api) {
            'openweathermap' => $this->adapter = new OpenWeatherMapAdapter(),
            default => throw new Exception(
                "Unknown weather API '$weather_api'"
            ),
        };
    }

    /**
     * Bootstrap any application services.
     *
     * @return string
     */
    public function getForecast($city)
    {
        $params = config('weather.cities');
        if (!array_key_exists($city, $params)) {
            return "Unknown city: '$city'";
        }
        $city_coords = $params[$city];
        if (
            !array_key_exists('longitude', $city_coords) ||
            !array_key_exists('latitude', $city_coords)
        ) {
            return "City misconfigured: '$city' must have both 'latitude' and 'longitude'";
        }
        $longitude = $city_coords['longitude'];
        $latitude = $city_coords['latitude'];
        return $this->adapter->getForecast($longitude, $latitude);
    }
}
