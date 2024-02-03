<?php

namespace Database\Factories;

use App\Models\ParkingZone;
use App\Models\Pricing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParkingZone>
 */
class ParkingZoneFactory extends Factory
{
    protected $model = ParkingZone::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'pricing_id' => Pricing::factory()
        ];
    }
}
