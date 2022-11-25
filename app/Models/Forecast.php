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
        'advice',
    ];

    /**
     * Constructor
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setAttribute('advice', Conversions::weatherAdvice($this));
    }

    /**
     * Convert the forecast to stdClass
     * @return stdClass
     */
    public function toObject(): stdClass
    {
        return (object)[
            // FIXME: This 'city' needs work: sometimes the OpenWeatherMap API returns different
            // FIXME: names for the same city, like 'Gemeente Tilburg' alternating with 'Tilburg'.
            'city' => $this->city,
            'temperature' => $this->temperature,
            'wind' => [
                'force' => $this->wind_force,
                'direction' => $this->wind_direction,
            ],
            'advice' => $this->advice,
        ];
    }
}
