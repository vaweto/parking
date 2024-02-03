<?php

namespace Database\Seeders;

use App\Models\ParkingZone;
use App\Models\Pricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParkingZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(PricingSeeder::class);

        ParkingZone::factory()->for(Pricing::inRandomOrder()->first())->create(['name' => 'blue zone']);
        ParkingZone::factory()->for(Pricing::inRandomOrder()->first())->create(['name' => 'white zone']);
        ParkingZone::factory()->for(Pricing::inRandomOrder()->first())->create(['name' => 'yellow zone']);
    }
}
