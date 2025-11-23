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
    $table->id('bookingID'); // PK
    $table->unsignedBigInteger('playerID');
    $table->unsignedBigInteger('turfID');
    $table->unsignedBigInteger('slotID');
    $table->dateTime('startTime');
    $table->dateTime('endTime');
    $table->decimal('totalCost', 10, 2);
    $table->string('status');
    $table->timestamps();

    // Correct foreign keys
    $table->foreign('playerID')->references('userID')->on('users')->onDelete('cascade');
    $table->foreign('turfID')->references('turfID')->on('turfs')->onDelete('cascade');
    $table->foreign('slotID')->references('slotID')->on('time_slots')->onDelete('cascade');
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