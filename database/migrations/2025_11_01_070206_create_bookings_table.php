<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('playerID')->constrained('users')->onDelete('cascade');
            $table->foreignId('turfID')->constrained('turfs')->onDelete('cascade');
            $table->foreignId('slotID')->constrained('time_slots')->onDelete('cascade');
            $table->dateTime('startTime');
            $table->dateTime('endTime');
            $table->decimal('totalCost', 10, 2);
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
