<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Return a view with the weather dropdown and (if city selected) forecast.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        $cities = array_keys(config('weather.cities'));
        $current_city = $request->get('city');
        $forecast = 'Weer voor een feestje';

        return view('weather', [
            'cities' => $cities,
            'current_city' => $current_city,
            'forecast' => $forecast,
        ]);
    }
}
