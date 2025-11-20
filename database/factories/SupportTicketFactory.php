<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SupportTicket>
 */
class SupportTicketFactory extends Factory
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
            'adminID' => null, // Or \App\Models\User::factory() for admin
            'subject' => $this->faker->sentence(6),
            'message' => $this->faker->paragraph(2),
            'status' => $this->faker->randomElement(['open', 'closed', 'pending']),
            'dateCreated' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
