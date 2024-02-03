<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate_number' => $this->faker->randomNumber(5),
            'user_id' => User::factory(),
            'color' => $this->faker->colorName,
            'brand' => 'ford',
            'vehicle_type_id' => VehicleType::factory()
        ];
    }
}
