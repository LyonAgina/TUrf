<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userID' => \App\Models\User::factory(),
            'message' => $this->faker->sentence(12),
            'isRead' => $this->faker->boolean,
            'dateSent' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
