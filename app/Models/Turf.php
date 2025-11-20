<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turf extends Model
{
    /** @use HasFactory<\Database\Factories\TurfFactory> */
    use HasFactory;

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'turfID', 'turfID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'locationID');
    }
}
