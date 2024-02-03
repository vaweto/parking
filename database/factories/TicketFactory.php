<?php

namespace Database\Factories;

use App\Models\ParkingZone;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'user_id' => function (array $attributes) {
                return Vehicle::find($attributes['vehicle_id'])->user_id;
            },
            'parking_zone_id' => ParkingZone::factory(),
            'start_at' => Carbon::now(),
            'expires_at' => Carbon::now()->addHour(),
            'cost_in_cents' => 100
        ];
    }
}
