<?php

namespace App\Models;

use App\Helpers\Conversions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

class Forecast extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city',
        'longitude',
        'latitude',
        'temperature',
        'wind_force',
        'wind_direction',
        'kind',
    ];

    /**
     * Constructor
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct([
            ...$attributes,
            'city'           => $attributes['city']           ?: '',
            'longitude'      => $attributes['longitude']      ?: null,
            'latitude'       => $attributes['latitude']       ?: null,
            'temperature'    => $attributes['temperature']    ?: null,
            'wind_force'     => $attributes['wind_force']     ?: null,
            'wind_direction' => $attributes['wind_direction'] ?: '',
            'kind'           => '',
        ]);
        $this->setAttribute('kind', Conversions::kindOfWeather($this));
    }

    /**
     * Convert the forecast to stdClass
     * @return stdClass
     */
    public function toObject(): stdClass
    {
        return (object)[
            'city' => $this->city,
            'temperature' => $this->temperature,
            'wind' => [
                'force' => $this->wind_force,
                'direction' => $this->wind_direction,
            ],
            'kind' => $this->kind,
        ];
    }
}
