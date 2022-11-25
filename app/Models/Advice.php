<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advice extends Model
{
    use HasFactory;

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
     * @return HasMany
     */
    public function forecasts(): HasMany
    {
        return $this->hasMany(Forecast::class);
    }

}
