<?php
namespace App\Models;  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    public function booking()
    {
        return $this->belongsTo(\App\Models\Booking::class, 'bookingID', 'id');
    }
}
