<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        parent::__construct([
            ...$attributes,
            'temperature'    => $attributes['temperature']    ?: 'unknown',
            'wind_force'     => $attributes['wind_force']     ?: 'unknown',
            'wind_direction' => $attributes['wind_direction'] ?: 'unknown',
        ]);
    }

    /**
     * Convert the forecast to json string
     * @param int $options
     * @return string
     */
    public function toJson($options = 0): string
    {
        return json_encode([
            'temperature' => $this->temperature,
            'wind' => [
                'force' => $this->wind_force,
                'direction' => $this->wind_direction,
            ],
        ]);
    }
}
