<?php

namespace App\Models;

use App\Helpers\Conversions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use stdClass;

class Forecast extends Model
{
    use HasFactory;

    public string $city;
    public float $longitude;
    public float $latitude;
    public float $temperature;
    public int $wind_force;
    public string $wind_direction;

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
    ];

    /**
     * Constructor
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->advice()->associate(Conversions::forecastToAdvice($this));
    }

    /**
     * @return BelongsTo
     */
    public function advice(): BelongsTo
    {
        return $this->belongsTo(Advice::class, 'advice_id');
    }

    /**
     * Convert the forecast to stdClass
     * @return stdClass
     */
    public function toObject(): stdClass
    {
        return (object)[
            // The city name is normalized by the OpenWeatherMap API, but not
            // consistently: e.g. 'Gemeente Tilburg' alternates with 'Tilburg'.
            'city' => $this->city,
            'temperature' => $this->temperature,
            'wind' => [
                'force' => $this->wind_force,
                'direction' => $this->wind_direction,
            ],
            'advice' => $this->advice->description,
        ];
    }
}
