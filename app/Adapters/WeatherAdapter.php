<?php

namespace App\Adapters;

abstract class WeatherAdapter
{
    /**
     * Must implement getForecast
     *
     * @param float $longitude
     * @param float $latitude
     * @return string
     */
    abstract public function getForecast(float $longitude, float $latitude): string;
}
