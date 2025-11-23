<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    /** @use HasFactory<\Database\Factories\TimeSlotFactory> */
    use HasFactory;

    protected $fillable = [
        'turfID',
        'startTime',
        'endTime',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'slotID', 'slotID');
    }
}
