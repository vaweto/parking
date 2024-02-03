<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cost_in_cents'
    ];

    /**
     * @return HasMany
     */
    public function parkingZones(): HasMany
    {
        return $this->hasMany(ParkingZone::class);
    }
}
