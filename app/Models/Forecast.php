<?php

namespace App\Models;

use App\Helpers\Conversions;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use stdClass;

/**
 * App\Models\Forecast
 *
 * @property int $id
 * @property string $city
 * @property float|null $longitude
 * @property float|null $latitude
 * @property float|null $temperature
 * @property int|null $wind_force
 * @property string $wind_direction
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Advice|null $advice
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast query()
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereKind($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereWindDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Forecast whereWindForce($value)
 * @mixin Eloquent
 */
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
            // N.B. the city name is normalized by the OpenWeatherMap API, but not
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
