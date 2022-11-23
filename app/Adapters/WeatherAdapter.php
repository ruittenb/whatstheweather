<?php

namespace App\Adapters;

use \App\Models\Forecast;
use stdClass;

abstract class WeatherAdapter
{
    /**
     * @param float $longitude
     * @param float $latitude
     * @return Forecast
     */
    abstract public function getForecast(float $longitude, float $latitude): Forecast;
}
