<?php

namespace App\Adapters;

use App\Models\Forecast;
use stdClass;

class TestWeatherAdapter extends WeatherAdapter
{
    /**
     * Fetch example forecast
     *
     * @param float $longitude
     * @param float $latitude
     * @return Forecast
     */
    public function getForecast(float $longitude, float $latitude): Forecast
    {
        return new Forecast();
    }
}
