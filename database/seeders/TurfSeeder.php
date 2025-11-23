<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turf;

class TurfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 turfs using the factory
        Turf::factory()->count(10)->create();
    }
}
