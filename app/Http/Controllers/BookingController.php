<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;

class BookingController extends Controller
{
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

        // Create booking (customize as needed)
        $booking = new \App\Models\Booking();
        $booking->turfID = $data['turf_id'];
        $booking->playerName = $data['name'];
        $booking->playerEmail = $data['email'];
        $booking->playerPhone = $data['phone'];
        $booking->paymentInfo = $data['payment_info'];
        $booking->status = 'upcoming';
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
