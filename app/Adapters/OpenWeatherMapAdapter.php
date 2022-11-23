<?php

namespace App\Adapters;

class OpenWeatherMapAdapter extends WeatherAdapter
{
    /**
     * Fetch forecast from remote API.
     *
     * @param float $longitude
     * @param float $latitude
     * @return string
     */
    public function getForecast(float $longitude, float $latitude): string
    {
        $base_url = config('weather.apis.openweathermap.url');
        $key = config('weather.apis.openweathermap.key');
        $url = sprintf($base_url, $longitude, $latitude, $key);
        return $forecast = $url; // TODO
    }
}
