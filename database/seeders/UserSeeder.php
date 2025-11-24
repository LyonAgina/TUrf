<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 5 Admin users with default password and realistic emails
        for ($i = 1; $i <= 5; $i++) {
            User::firstOrCreate(
                ['email' => "admin$i@example.com"], // Check by email
                [
                    'name' => "Admin User $i",
                    'password' => bcrypt('password'), // Default password for Admins
                    'role' => 'Admin',
                ]
            );
        }

        // Create default Player users
        for ($i = 1; $i <= 10; $i++) {
            User::factory()->create();
        }

        // Check if the Owner User already exists before creating
        User::firstOrCreate(
            ['email' => 'owner@example.com'], // Check by email
            [
                'name' => 'Owner User',
                'password' => bcrypt('password'), // Default password for Owner
                'role' => 'Owner',
            ]
        );
    }
}