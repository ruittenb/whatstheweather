<?php

namespace App\Http\Controllers\Api;

use App\Clients\WeatherClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;

class WeatherController extends Controller
{
    /**
     * Constructor
     */
    function __construct(private readonly WeatherClient $client = new WeatherClient())
    {
    }

    /**
     * Return a Json string with the forecast data
     *
     * @param Request $request
     * @return string
     */
    public function show(Request $request): string
    {
        $city = $request->input('city', 'unknown') ?: 'unknown';
        try {
            $forecast = $this->client->getForecast($city)->toJson(); // via \App\Models\Forecast
        } catch (Exception $e) {
            $forecast = '{}'; // empty json object
        }

        return $forecast;
    }
}
