<?php

namespace Database\Factories;

use App\Models\VehicleType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleType>
 */
class VehicleTypeFactory extends Factory
{
    protected $model = VehicleType::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
