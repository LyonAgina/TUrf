<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $this->call([
    RoleSeeder::class,
    UserSeeder::class,
    TurfSeeder::class,
    ArenaSeeder::class,
    LocationSeeder::class,
    TimeSlotSeeder::class, // <-- before bookings
    BookingSeeder::class,
    PaymentSeeder::class,
    NotificationSeeder::class,
    ReviewSeeder::class,
    PayoutSeeder::class,
    SupportTicketSeeder::class,
]);


    }
}
