<?php

namespace App\Helpers;

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
     * Convert wind speed in m/s to the Beaufort scale
     * @param float $speed
     * @return int
     */
    public static function speedToBeaufort(float $speed): int
    {
        match (true) {
            $speed <  0.4 => $beaufort = 0,
            $speed <  1.3 => $beaufort = 1,
            $speed <  3.1 => $beaufort = 2,
            $speed <  5.4 => $beaufort = 3,
            $speed <  8.0 => $beaufort = 4,
            $speed < 10.7 => $beaufort = 5,
            $speed < 13.9 => $beaufort = 6,
            $speed < 17.0 => $beaufort = 7,
            $speed < 20.6 => $beaufort = 8,
            $speed < 24.1 => $beaufort = 9,
            $speed < 28.2 => $beaufort = 10,
            $speed < 32.3 => $beaufort = 11,
            default       => $beaufort = 12,
        };
        return $beaufort;
    }

    /**
     * @param Forecast $forecast
     * @return string
     */
    public static function forecastToAdvice(Forecast $forecast): string
    {
        } else if ($forecast->temperature > 20) {
            $advice = 'Nice for a walk on the beach.';
        } else {
            $advice = 'No advice for this weather.';
        }
        return $advice;
    }

}
