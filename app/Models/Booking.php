<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    // --- Primary Key Fixes ---
    protected $primaryKey = 'bookingID';
    public $incrementing = true; 
    protected $keyType = 'int'; 
    // If you use route model binding, include this:
    public function getRouteKeyName()
    {
        return 'bookingID';
    }

    // --- Relationships ---
    public function player()
    {
        return $this->belongsTo(\App\Models\User::class, 'playerID', 'userID');
    }

    public function turf()
    {
        return $this->belongsTo(\App\Models\Turf::class, 'turfID', 'turfID');
    }

    public function slot()
    {
        return $this->belongsTo(\App\Models\TimeSlot::class, 'slotID', 'slotID');
    }

    protected $fillable = [
        'playerID', 'turfID', 'date', 'slotID', 'startTime', 'endTime', 'totalCost', 'status', 'guestInfo'
    ];
}