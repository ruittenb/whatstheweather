<?php

return [

    /**
     * Which API to use?
     */
    'api_name' => 'openweathermap',
    //'api_name' => 'test',

    /**
     * API parameters (API dependent)
     */
    'apis' => [
        /**
         * @see https://openweathermap.org/current
         */
        'openweathermap' => [
            'url' => 'https://api.openweathermap.org/data/2.5/weather?lat=%f&lon=%f&appid=%s&units=metric',
            'key' => env('OPENWEATHERMAP_KEY', ''),
        ],

        'test' => [
        ],
    ],

    /**
     * Throttle series of requests by this amount in seconds (float)
     *
     * N.B. Limits for OpenWeatherMap API free plan:
     *             60 calls/minute
     *      1_000_000 calls/month
     */
    'throttle_seconds' => 1.5,

    /**
     * Preconfigured cities.
     */
    'cities' => [
        'Nijmegen' => [
            'longitude' =>  5.8625, //  5°51′45″E
            'latitude'  => 51.8475, // 51°50′51″N
        ],
        'Hoorn' => [
            'longitude' =>  5.0667, //  5°04′E
            'latitude'  => 52.65,   // 52°39′N
        ],
        'Tilburg' => [
            'longitude' =>  5.0833, //  5°05′E
            'latitude'  => 51.55,   // 51°33′N
        ],
        'Amsterdam' => [
            'longitude' =>  4.9,    //  4°54′E
            'latitude'  => 52.3667, // 52°22′N
        ],
        'Den Bosch' => [
            'longitude' =>  5.3,    //  5°18′E
            'latitude'  => 51.6833, // 51°41′N
        ],
        // Foreign
        'New York' => [
            'longitude' => -74.0061, // 74°00′22″W
            'latitude'  =>  40.7128, // 40°42′46″N
        ],
        'Paramaribo' => [
            'longitude' => 55.2039, // 55°12′14″W
            'latitude'  =>  5.8222, //  5°51′08″N
        ],
        'Ulaanbaatar' => [
            'longitude' => 106.9172, // 106°55′02″E
            'latitude'  =>  47.9203, //  47°55′13″N
        ],
    ],
];
