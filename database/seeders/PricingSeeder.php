<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pricing::factory()->create(['cost_in_cents' => 300]);
        Pricing::factory()->create(['cost_in_cents' => 100]);
    }
}
