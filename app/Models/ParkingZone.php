<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkingZone extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'pricing_id'
    ];

    /**
     * @return BelongsTo
     */
    public function pricing(): BelongsTo
    {
        return $this->belongsTo(Pricing::class);
    }
}
