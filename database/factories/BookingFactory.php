<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Turf;
use App\Models\TimeSlot;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    public function definition(): array
    {
        // Get existing IDs
        $playerIDs = User::pluck('userID');
        $turfIDs = Turf::pluck('turfID');
        $slotIDs = TimeSlot::pluck('slotID');

        // If no related records exist, return empty array to avoid FK errors
        if ($playerIDs->isEmpty() || $turfIDs->isEmpty() || $slotIDs->isEmpty()) {
            return [];
        }

        $start = $this->faker->dateTimeBetween('+1 days', '+2 days');
        $end = (clone $start)->modify('+2 hours');

        return [
            'playerID' => $playerIDs->random(),
            'turfID' => $turfIDs->random(),
            'slotID' => $slotIDs->random(),
            'startTime' => $start,
            'endTime' => $end,
            'totalCost' => $this->faker->randomFloat(2, 1000, 10000),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
        ];
    }
}
