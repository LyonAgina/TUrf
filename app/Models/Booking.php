<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<\Database\Factories\BookingFactory> */
    use HasFactory;

    public function player()
    {
        return $this->belongsTo(User::class, 'playerID', 'userID');
    }

    public function turf()
    {
        return $this->belongsTo(Turf::class, 'turfID', 'turfID');
    }

    public function slot()
    {
        return $this->belongsTo(TimeSlot::class, 'slotID', 'slotID');
    }
}
