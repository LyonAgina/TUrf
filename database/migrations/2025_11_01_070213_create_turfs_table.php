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
        Schema::create('turfs', function (Blueprint $table) {
            $table->id('turfID');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('pricePerHour', 10, 2);
            $table->unsignedBigInteger('ownerID')->nullable();
            $table->unsignedBigInteger('locationID')->nullable();
            $table->timestamps();
            $table->foreign('ownerID')->references('userID')->on('users')->onDelete('set null');
            $table->foreign('locationID')->references('locationID')->on('locations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turfs');
    }
};
