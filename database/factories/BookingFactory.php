<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('+1 days', '+2 days');
        $end = (clone $start)->modify('+2 hours');
        return [
            'playerID' => \App\Models\User::factory(),
            'turfID' => \App\Models\Turf::factory(),
            'slotID' => 1, // You may want to seed time slots separately
            'startTime' => $start,
            'endTime' => $end,
            'totalCost' => $this->faker->randomFloat(2, 1000, 10000),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
