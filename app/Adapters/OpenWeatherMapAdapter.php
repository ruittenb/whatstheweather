<?php

namespace App\Adapters;

use App\Models\Forecast;
use App\Helpers\Conversions;
use GuzzleHttp\Client as HttpClient;
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
        $http_client = new HttpClient();
        $response = $http_client->request('GET', $url);
        // if ($response->getStatusCode() !== '200') {
        // }
        $forecast_data = json_decode($response->getBody());

        return new Forecast([
            'city'           => $forecast_data->name,
            'longitude'      => $forecast_data->coord->lon,
            'latitude'       => $forecast_data->coord->lat,
            'temperature'    => $forecast_data->main->temp,
            'wind_force'     => Conversions::speedToBeaufort($forecast_data->wind->speed),
            'wind_direction' => Conversions::angleToCompassDirection($forecast_data->wind->deg),
            // 'kind' will be determined by Forecast model
        ]);
    }
}
