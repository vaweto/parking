<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::create(['name' => 'car']);
        VehicleType::create(['name' => 'motorcycle']);
        VehicleType::create(['name' => 'van']);
        VehicleType::create(['name' => 'truck']);
        VehicleType::create(['name' => 'bicycle']);
    }
}
