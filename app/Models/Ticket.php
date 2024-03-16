<?php

namespace App\Models;

use App\Observers\TicketObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([TicketObserver::class])]
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

    protected static function booted()
    {
        static::addGlobalScope('user', fn(Builder $builder) => $builder->where('user_id', auth()->id()));
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(ParkingZone::class, 'parking_zone_id');
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive(Builder $query)
    {
        return $query->where(function (Builder $query) {
           return $query->whereNull('expires_at')
               ->orWhere('expires_at', '>', Carbon::now());
        });
    }

    public function scopeExpired(Builder $query)
    {
        return $query->where('expires_at', '<', Carbon::now());
    }

    public function isActive()
    {
        return is_null($this->expires_at) || $this->expires_at->gt(now());
    }
}
