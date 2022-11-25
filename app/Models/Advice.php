<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Advice
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $sort_order
 * @property float|null $temperature_min
 * @property float|null $temperature_max
 * @property int|null $wind_force_min
 * @property int|null $wind_force_max
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AdviceFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advice query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereTemperatureMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereTemperatureMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereWindForceMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advice whereWindForceMin($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Forecast[] $forecasts
 * @property-read int|null $forecasts_count
 */
class Advice extends Model
{
    use HasFactory;

    public const NO_ADVICE = 999_999_999;

    protected $table = 'advices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sort_order',
        'temperature_min',
        'temperature_max',
        'wind_force_min',
        'wind_force_max',
        'description',
    ];

    /**
     * Get the ID of the NO_ADVICE record
     *
     * @return int
     */
    public static function getNoAdviceId() {
        return static::where('sort_order', Advice::NO_ADVICE)->first()->id;
    }

    /**
     * @return HasMany
     */
    public function forecasts(): HasMany
    {
        return $this->hasMany(Forecast::class);
    }

}
