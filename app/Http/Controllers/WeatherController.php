<?php

namespace App\Http\Controllers;

use App\Clients\WeatherClient;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Constructor
     */
    function __construct(private WeatherClient $client = new WeatherClient())
    {
    }




    /**
     * Return a view with the weather dropdown and (if city selected) forecast.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        $cities = array_keys(config('weather.cities'));
        $city = $request->get('city');
        $forecast = $this->client->getForecast($city);

        return view('weather', [
            'cities' => $cities,
            'current_city' => $city,
            'forecast' => $forecast,
        ]);
    }
}
