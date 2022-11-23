<?php

return [

    /**
     * Which API to use?
     */
    'api_name' => 'openweathermap',
    //'api_name' => 'test',

    /**
     * API parameters
     */
    'apis' => [
        /**
         * @see https://openweathermap.org/current
         */
        'openweathermap' => [
            'url' => 'https://api.openweathermap.org/data/2.5/weather?lat=%f&lon=%f&appid=%s',
            'key' => env('OPENWEATHERMAP_KEY', ''),
        ],

        'test' => [
        ],
    ],

    /**
     * Preconfigured cities.
     */
    'cities' => [
        'Nijmegen' => [
            'longitude' => 51.8475, // 51°50′51″N
            'latitude' => 5.8625,   // 05°51′45″E
        ],
        'Hoorn' => [
            'longitude' => 52.65, // 52°39′N
            'latitude' => 5.0677, //  5°04′E
        ],
        'Tilburg' => [
            'longitude' => 51.55, // 51°33′N
            'latitude' => 5.0833, //  5°05′E
        ],
    ],
];
