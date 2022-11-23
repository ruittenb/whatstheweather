<?php

namespace App\Adapters;

use App\Models\Forecast;
use stdClass;

class OpenWeatherMapAdapter extends WeatherAdapter
{
    /**
     * Fetch forecast from remote API.
     *
     * @param float $longitude
     * @param float $latitude
     * @return Forecast
     *
     * Example return data: @see documentation/forecast.json
     */
    public function getForecast(float $longitude, float $latitude): Forecast
    {
        $base_url = config('weather.apis.openweathermap.url');
        $key = config('weather.apis.openweathermap.key');
        $url = sprintf($base_url, $longitude, $latitude, $key);
        return $this->_fetchForecast($url);
    }

    /**
     * @see https://openweathermap.org/current
     *
     * @param $url
     * @return Forecast
     */
    protected function _fetchForecast($url): Forecast
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $forecast_data = json_decode($response);

        return new Forecast([
            'temperature' => $forecast_data->main->temp, // or translate to Celsius
            'wind_force' => $forecast_data->wind->speed, // or translate to Beaufort
            'wind_direction' => $forecast_data->wind->deg, // or translate to cardinal directions
        ]);
    }
}
