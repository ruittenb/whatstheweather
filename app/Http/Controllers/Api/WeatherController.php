<?php

namespace App\Http\Controllers\Api;

use App\Clients\WeatherClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use stdClass;

class WeatherController extends Controller
{
    /**
     * Constructor
     */
    function __construct(private readonly WeatherClient $client = new WeatherClient())
    {
    }

    /**
     * Return an object with the forecast data
     *
     * @param Request $request
     * @return stdClass
     */
    public function show(Request $request): stdClass
    {
        $city = $request->input('city', 'unknown') ?: 'unknown';
        try {
            $forecast = $this->client->getForecast($city)->toObject(); // via \App\Models\Forecast
        } catch (Exception) {
            // TODO add error message to object
            $forecast = new stdClass();
        }

        return $forecast;
    }
}
