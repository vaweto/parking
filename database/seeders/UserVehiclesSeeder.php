<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserVehiclesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->create()
            ->each(
                fn($user) => Vehicle::factory()
                    ->for($user)
                    ->for(VehicleType::inRandomOrder()->first(), 'type')
                    ->create()
            );
    }
}
