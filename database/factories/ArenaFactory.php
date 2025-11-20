<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arena>
 */
class ArenaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company . ' Arena',
            'location' => $this->faker->city,
            'capacity' => $this->faker->numberBetween(50, 500),
        ];
    }
}
