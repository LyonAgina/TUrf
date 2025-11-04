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
        $user = auth()->user();
        if (!$user) {
            // Optionally redirect to login or show empty bookings
            return redirect()->route('login');
        }
        $userId = property_exists($user, 'userID') ? $user->userID : $user->id;
        $bookings = \App\Models\Booking::with(['turf', 'slot'])
            ->where('playerID', $userId)
            ->orderBy('startTime', 'desc')
            ->get();

        // Group bookings by status
        $grouped = [
            'upcoming' => $bookings->where('status', 'upcoming'),
            'completed' => $bookings->where('status', 'completed'),
            'cancelled' => $bookings->where('status', 'cancelled'),
        ];

        return view('bookings', [
            'bookings' => $grouped
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        //
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
