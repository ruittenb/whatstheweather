<?php

namespace App\Http\Controllers;

use App\Clients\WeatherClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
     * @return Application|Factory|View
     */
    public function show(Request $request)
    {
        try {
            $city = $request->get('city');
        } catch (Exception $e) {
            $city = 'unknown';
        }
        try {
            $forecast = $this->client->getForecast($city); // \App\Models\Forecast
        } catch (Exception $e) {
            $forecast = null;
        }

        $cities = array_keys(config('weather.cities'));
        return view('weather', [
            'cities' => $cities,
            'current_city' => $city,
            'forecast' => $forecast,
        ]);
    }
}
