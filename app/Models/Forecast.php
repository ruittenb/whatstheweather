<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    use HasFactory;

    public function __construct(
        private readonly string $temperature = 'unknown',
        private readonly string $wind_force = 'unknown',
        private readonly string $wind_direction = 'unknown',
    )
    {}

    /**
     * Convert the forecast to ascii string
     * @return string
     */
    public function toText()
    {
        return "Temperature: $this->temperature; Wind: force $this->wind_force, direction $this->wind_direction.";
    }

    // TODO toHtml()
}
