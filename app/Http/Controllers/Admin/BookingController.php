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
                $q->where('user_id', 'like', "%$search%")
                  ->orWhere('turf_id', 'like', "%$search%")
                  ->orWhere('date', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%");
            });
        }
        $bookings = $query->get();
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
    public function edit(Booking $booking) { return view('admin.bookings.edit', compact('booking')); }
    public function update(Request $request, Booking $booking) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'turf_id' => 'required|integer|exists:turfs,id',
            'date' => 'nullable|date',
        ]);
        $booking->update($validated);
        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully.');
    }
    public function destroy(Booking $booking) { $booking->delete(); return redirect()->route('admin.bookings.index'); }
}
