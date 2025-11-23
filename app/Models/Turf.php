<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turf extends Model
{
    use HasFactory;
    
    // 👇 ADD THIS LINE TO DEFINE THE PRIMARY KEY
    protected $primaryKey = 'turfID';
    
    // 👇 ADD THIS LINE IF YOU ARE NOT USING AUTO-INCREMENTING KEYS (Unlikely, but good practice if not using 'id')
    // public $incrementing = true; 

    protected $fillable = [
        'name',
        'description',
        // Note: The previous error used 'price', but your model uses 'pricePerHour'. 
        // Ensure consistency between your DB schema, fillable, and controller calculation.
        'pricePerHour', 
        'ownerID',
        'locationID',
        'image',
    ];
    
    public function bookings()
    {
        // Note: When defining hasMany, if the foreign key matches the primary key name + '_id' (e.g., turf_id), 
        // you only need the foreign key argument. Since you use 'turfID' twice, this is explicitly correct.
        return $this->hasMany(Booking::class, 'turfID', 'turfID');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'locationID');
    }
}