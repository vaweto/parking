<?php

namespace Database\Seeders;

use App\Models\ParkingZone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParkingZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParkingZone::create(['name' => 'blue zone', 'cost_in_cents' => '100']);
        ParkingZone::create(['name' => 'white zone', 'cost_in_cents' => '200']);
        ParkingZone::create(['name' => 'yellow zone', 'cost_in_cents' => '300']);
    }
}
