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
       Schema::create('support_tickets', function (Blueprint $table) {
            $table->id('ticketID');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('adminID')->nullable();
            $table->string('subject');
            $table->text('message');
            $table->string('status');
            $table->dateTime('dateCreated');
            $table->timestamps();
            $table->foreign('userID')->references('userID')->on('users')->onDelete('cascade');
            $table->foreign('adminID')->references('userID')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_tickets');
    }
};
