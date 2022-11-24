<?php

namespace App\Http\Controllers\Api;

use App\Clients\WeatherClient;
use App\Models\Forecast;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
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
            $forecast = $this->client->getForecast($city);
            $forecast_data = $forecast->toObject();
        } catch (Exception) {
            // TODO add error message to object
            $forecast_data = new stdClass();
        }

        return $forecast_data;
    }

    /**
     * Return an object with the forecast data
     *
     * @param Request $request
     * @return array<stdClass>
     */
    public function report(Request $request): array
    {
        try {
            $city = $request->input('city', 'unknown') ?: 'unknown';
            $forecast_table = DB::table('forecasts');
            $forecast_data = $forecast_table
                ->where('city', $city)
                ->orderBy('created_at')
                ->get()->all();
            // $forecast_data = Forecast::query()->where('city', $city)->get();
        } catch (Exception $e) {
            $forecast_data = [];
        }

        return $forecast_data;
    }
}
