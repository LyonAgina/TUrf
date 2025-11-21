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
            'image' => $this->faker->randomElement([
                'arena1.jpg',
                'arena2.jpg',
                'arena3.jpg',
                'arena4.jpg',
                'arena5.jpg',
            ]),
            'sport' => $this->faker->randomElement(['football', 'futsal', 'basketball']),
        ];
    }
}
