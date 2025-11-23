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
       Schema::create('reviews', function (Blueprint $table) {
            $table->id('reviewID');
            $table->unsignedBigInteger('turfID');
            $table->unsignedBigInteger('userID');
            $table->integer('rating');
            $table->text('comment')->nullable();
            $table->dateTime('datePosted');
            $table->timestamps();
            $table->foreign('turfID')->references('turfID')->on('turfs')->onDelete('cascade');
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
