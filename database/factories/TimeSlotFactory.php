<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeSlot>
 */
class TimeSlotFactory extends Factory
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
            'turfID' => \App\Models\Turf::factory(),
            'startTime' => $start,
            'endTime' => $end,
            'status' => $this->faker->randomElement(['available', 'booked', 'unavailable']),
        ];
    }
}
