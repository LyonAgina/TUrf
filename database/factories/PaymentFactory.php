<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bookingID' => \App\Models\Booking::factory(),
            'amount' => $this->faker->randomFloat(2, 1000, 10000),
            'paymentDate' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['paid', 'pending', 'failed']),
            'transactionCode' => strtoupper($this->faker->bothify('??##??##??')),
        ];
    }
}
