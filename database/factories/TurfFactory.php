<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turf>
 */
class TurfFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Turf',
            'description' => $this->faker->sentence(10),
            'pricePerHour' => $this->faker->randomFloat(2, 500, 5000),
            'ownerID' => \App\Models\User::factory(),
            'locationID' => \App\Models\Location::factory(),
        ];
    }
}
