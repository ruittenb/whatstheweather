<?php

namespace App\Helpers;

use App\Models\Advice;
use App\Models\Forecast;

class Conversions
{
    static array $directions = [
        "N", "NNE", "NE", "ENE", "E", "ESE", "SE", "SSE", "S", "SSW", "SW", "WSW", "W", "WNW", "NW", "NNW"
    ];

    /**
     * Convert temperatures in K to °C
     * @param float $kelvin
     * @return float
     */
    public static function kelvinToCelsius(float $kelvin): float
    {
        return $kelvin - 273.15;
    }

    /**
     * Convert wind direction in degrees to compass directions
     *
     * @see https://i.pinimg.com/564x/ff/14/77/ff1477c3a93e44cef33e6ad0ab007b14.jpg
     *
     * @param float $angle
     * @return string
     */
    public static function angleToCompassDirection(float $angle): string
    {
        $index = floor(($angle + 11.25) / 22.5);
        return self::$directions[$index % 16];
    }

    /**
     * Convert wind speed in m/s to force on the Beaufort scale
     *
     * @param float $speed
     * @return int
     */
    public static function speedToForce(float $speed): int
    {
        match (true) {
            $speed <  0.4 => $force = 0,
            $speed <  1.3 => $force = 1,
            $speed <  3.1 => $force = 2,
            $speed <  5.4 => $force = 3,
            $speed <  8.0 => $force = 4,
            $speed < 10.7 => $force = 5,
            $speed < 13.9 => $force = 6,
            $speed < 17.0 => $force = 7,
            $speed < 20.6 => $force = 8,
            $speed < 24.1 => $force = 9,
            $speed < 28.2 => $force = 10,
            $speed < 32.3 => $force = 11,
            default       => $force = 12,
        };
        return $force;
    }

    /**
     * @param Forecast $forecast
     * @return Advice
     */
    public static function forecastToAdvice(Forecast $forecast): Advice
    {
        $advices = Advice::all()->sortBy('sort_order');
        foreach ($advices as $advice) {
            if (
                ($advice->temperature_min === null || (float)$advice->temperature_min <= (float)$forecast->temperature) and
                ($advice->temperature_max === null || (float)$advice->temperature_max >= (float)$forecast->temperature) and
                ($advice->wind_force_min  === null || (float)$advice->wind_force_min  <= (float)$forecast->wind_force ) and
                ($advice->wind_force_max  === null || (float)$advice->wind_force_max  >= (float)$forecast->wind_force )
            ) {
                return $advice;
            }
        }
        return Advice::find(Advice::getNoAdviceId());
    }

}
