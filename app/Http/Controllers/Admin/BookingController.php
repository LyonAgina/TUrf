<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
class BookingController extends Controller {
    public function index(Request $request) {
        $query = Booking::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('playerID', 'like', "%$search%")
                  ->orWhere('turfID', 'like', "%$search%")
                  ->orWhere('startTime', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ->orWhereHas('player', function($uq) use ($search) {
                      $uq->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
                  })
                  ->orWhereHas('turf', function($tq) use ($search) {
                      $tq->where('name', 'like', "%$search%");
                  });
            });
        }
        $bookings = $query->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }
    public function create() { return view('admin.bookings.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'turf_id' => 'required|integer|exists:turfs,id',
            'date' => 'nullable|date',
        ]);
        Booking::create($validated);
        return redirect()->route('admin.bookings.index')->with('success', 'Booking created successfully.');
    }
    public function show(Booking $booking) { return view('admin.bookings.show', compact('booking')); }
    public function edit(Booking $booking) {
        $users = \App\Models\User::all();
        $turfs = \App\Models\Turf::all();
        return view('admin.bookings.edit', compact('booking', 'users', 'turfs'));
    }
    public function update(Request $request, Booking $booking) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,userID',
            'turf_id' => 'required|integer|exists:turfs,turfID',
            'startTime' => 'required|date',
        ]);
        $booking->playerID = $validated['user_id'];
        $booking->turfID = $validated['turf_id'];
        $booking->startTime = $validated['startTime'];
        $booking->save();
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }
    public function destroy(Booking $booking) { $booking->delete(); return redirect()->route('admin.bookings.index'); }
}
