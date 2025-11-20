<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payout>
 */
class PayoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ownerID' => \App\Models\User::factory(),
            'amount' => $this->faker->randomFloat(2, 1000, 10000),
            'status' => $this->faker->randomElement(['processed', 'pending', 'failed']),
            'dateProcessed' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
