<?php

namespace App\Http\Controllers;

use App\Clients\WeatherClient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
     * Pass the city/cities and forecast data to the view.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function show(Request $request): View|Factory|Application
    {
        $city = $request->input('city', 'unknown') ?: 'unknown';
        try {
            $forecast = $this->client->getForecast($city);
            $forecast_data = $forecast->toObject();
        } catch (Exception) {
            // TODO add error message to object
            $forecast_data = new stdClass();
        }

        $cities = array_keys(config('weather.cities'));
        sort($cities); // there exists no sort() function that returns the sorted data
        return view('weather', [
            'cities' => $cities,
            'current_city' => $city,
            'forecast' => $forecast_data,
        ]);
    }
}
