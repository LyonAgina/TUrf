<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Services\EmailService;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Booking;
use App\Models\Turf; // IMPORTANT: Added for price lookup
use Illuminate\Http\Request; // <-- NEW: Added to handle URL query parameters
use Illuminate\Support\Str; // <--- ADD THIS IMPORT

class BookingController extends Controller
{
    /**
     * Permanently delete a cancelled booking.
     */
    public function delete($bookingID)
    {
        $booking = Booking::where('bookingID', $bookingID)->firstOrFail();
        if ($booking->status !== 'cancelled') {
            return redirect()->back()->with('error', 'Only cancelled bookings can be deleted.');
        }
        $booking->delete();
        return redirect()->route('bookings')->with('success', 'Cancelled booking deleted.');
    }

    /**
     * Delete the turf from a booking, remove the booking, and refund the user.
     */
    public function turfDelete($bookingID, EmailService $emailService)
    {
        $booking = Booking::where('bookingID', $bookingID)->firstOrFail();
        if ($booking->status !== 'upcoming') {
            return redirect()->back()->with('error', 'Only upcoming bookings can be deleted and refunded.');
        }
        $turf = $booking->turf;
        $booking->status = 'cancelled';
        $booking->save();
        if ($turf) {
            $turf->delete();
        }
        $email = $booking->guestInfo ? json_decode($booking->guestInfo, true)['email'] ?? null : null;
        if (!$email && isset($booking->email)) $email = $booking->email;
        if ($email) {
            $emailService->send(
                $email,
                'Refund Processed',
                "Your refund is being processed. If you do not receive it within 48 hours, please call us at 0712345678."
            );
        }
        $booking->delete();
        return redirect()->route('bookings')->with('success', 'Turf deleted and booking refunded.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // FIX: Filter bookings by the logged-in user
        $query = Booking::with(['turf', 'slot'])
            ->orderBy('created_at', 'desc');

        if (auth()->check()) {
            $query->where('playerID', auth()->user()->userID);
        }
        
        $bookings = $query->get();

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
 public function create(Request $request) 
    {
        $turfs = \App\Models\Turf::all();
        
        // 1. Prioritize turf ID from the URL query string
        $selectedTurfId = $request->query('turfID'); 
        
        // 2. Autofill from user's last booking if no query param is set and user is logged in
        if (is_null($selectedTurfId) && auth()->check()) {
            
            // Query the user's latest booking using the latest() scope
            $lastBooking = Booking::where('playerID', auth()->user()->userID)
                                  ->latest() // Equivalent to orderBy('created_at', 'desc')
                                  ->first(); 
            
            if ($lastBooking) {
                // If a booking is found, use its turf ID
                $selectedTurfId = $lastBooking->turfID;
            } else {
                // Explicitly set to null if no booking is found (cleaner for the view)
                $selectedTurfId = null;
            }
        }
        
        // Ensure $selectedTurfId is set to null if it was never found (prevents potential issues)
        $selectedTurfId = $selectedTurfId ?: null;
        
        return view('bookings.create', [
            'turfs' => $turfs,
            'selectedTurfId' => $selectedTurfId, // <-- Pass the ID to the view
        ]);
    }
      
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request, EmailService $emailService)
    {
        $data = $request->validated();

        // 1. Fetch the Turf model explicitly using the validated ID
        $turf = Turf::where('turfID', $data['turfID'])->first();
        
        if (!$turf) {
            return redirect()->back()->with('error', 'Selected turf not found.');
        }

        $booking = new Booking();
        $booking->turfID = $data['turfID']; 
        $booking->playerID = auth()->check() ? auth()->user()->userID : null;
        $booking->slotID = $data['slot_id'] ?? 1;
        $booking->startTime = $data['start_time'] ?? now();
        $booking->endTime = $data['end_time'] ?? now()->addHour();
        
        // 2. FINAL FIX: Use the fetched $turf->price and fall back to 0.00 if it's NULL in the database.
        $booking->totalCost = $turf->price ?? 0.00; 
        
        $booking->status = 'upcoming';

        // store guest info if not logged-in
        if (Schema::hasColumn('bookings', 'guestInfo')) {
            $booking->guestInfo = json_encode([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'payment_info' => $data['payment_info'],
            ]);
        }

        $booking->save(); 

        // Optional: send confirmation email
        if ($data['email'] ?? false) {
            $emailService->send(
                $data['email'],
                'Booking Confirmation',
                'Your turf booking has been successfully created.'
            );
        }

        return redirect()->route('bookings')->with('success', 'Booking created!');
    }
}