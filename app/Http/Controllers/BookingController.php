<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Permanently delete a cancelled booking.
     */
    public function delete(\App\Models\Booking $booking)
    {
        if ($booking->status !== 'cancelled') {
            return redirect()->back()->with('error', 'Only cancelled bookings can be deleted.');
        }
        $booking->delete();
        return redirect()->route('bookings')->with('success', 'Cancelled booking deleted.');
    }
    /**
     * Delete the turf from a booking, remove the booking, and refund the user.
     */
    public function turfDelete(\App\Models\Booking $booking)
    {
        // Only allow if booking is upcoming
        if ($booking->status !== 'upcoming') {
            return redirect()->back()->with('error', 'Only upcoming bookings can be deleted and refunded.');
        }
        $turf = $booking->turf;
        // Refund logic (stub)
        // You would integrate with your payment provider here
        // For now, just set a refunded flag or message
        $booking->status = 'cancelled';
        $booking->save();
        if ($turf) {
            $turf->delete();
        }
        $booking->delete();
        return redirect()->route('bookings')->with('success', 'Turf deleted and booking refunded.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show all bookings for demonstration (customize as needed)
        $bookings = \App\Models\Booking::with(['turf', 'slot'])
            ->orderBy('created_at', 'desc')
            ->get();

        $grouped = [
            'upcoming' => $bookings->where('status', 'upcoming'),
            'completed' => $bookings->where('status', 'completed'),
            'cancelled' => $bookings->where('status', 'cancelled'),
        ];

        return view('bookings.index', [
            'bookings' => $grouped
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show booking form
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        // Store booking data
        $data = $request->validate([
            'turf_id' => 'required|exists:turfs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'payment_info' => 'required|string|max:255',
        ]);

        // Create booking (store guest info in JSON column if available, else fallback)
        $booking = new \App\Models\Booking();
        $booking->turfID = $data['turf_id'];
        $booking->playerID = null; // Set to null for guest booking
        $booking->slotID = 1; // Dummy slot, update with real slot selection
        $booking->startTime = now();
        $booking->endTime = now()->addHour();
        $booking->totalCost = 0; // Set to 0 or calculate based on turf
        $booking->status = 'upcoming';
        // Store guest info in a JSON column if it exists, else ignore
        if (Schema::hasColumn('bookings', 'guestInfo')) {
            $booking->guestInfo = json_encode([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'payment_info' => $data['payment_info'],
            ]);
        }
        $booking->save();

        return redirect()->route('bookings')->with('success', 'Booking successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
