<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_id',
        'parking_zone_id',
        'start_at',
        'expires_at',
        'cost_in_cents'
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'expires_at' => 'datetime'
    ];
}
