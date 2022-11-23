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
     * Return a view with the weather dropdown and (if city selected) forecast.
     *
     * @param Request $request
     * @return string
     */
    public function show(Request $request): string
    {
        try {
            $city = $request->get('city');
            $forecast = $this->client->getForecast($city)->toJson();
        } catch (Exception $e) {
            $forecast = '{}'; // empty json object
        }

        return $forecast;
    }
}
