<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TimeSlot;
class TimeSlotController extends Controller {
    public function index(Request $request) {
        $query = TimeSlot::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('startTime', 'like', "%$search%")
                  ->orWhere('endTime', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ->orWhere('turfID', 'like', "%$search%");
            });
        }
        $time_slots = $query->get();
        return view('admin.time_slots.index', compact('time_slots'));
    }
    public function create() {
        $turfs = \App\Models\Turf::all();
        return view('admin.time_slots.create', compact('turfs'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'turfID' => 'required|integer|exists:turfs,id',
            'startTime' => 'required|date_format:Y-m-d H:i:s',
            'endTime' => 'required|date_format:Y-m-d H:i:s|after:startTime',
            'status' => 'required|string|max:255',
        ], [
            'startTime.date_format' => 'Start Time must be in the format YYYY-MM-DD HH:MM:SS',
            'endTime.date_format' => 'End Time must be in the format YYYY-MM-DD HH:MM:SS',
            'endTime.after' => 'End Time must be after Start Time.'
        ]);
        TimeSlot::create($validated);
        return redirect()->route('admin.time_slots.index')->with('success', 'Time slot created successfully.');
    }
    public function show(TimeSlot $time_slot) { return view('admin.time_slots.show', compact('time_slot')); }
    public function edit(TimeSlot $time_slot) {
        $turfs = \App\Models\Turf::all();
        return view('admin.time_slots.edit', compact('time_slot', 'turfs'));
    }
    public function update(Request $request, TimeSlot $time_slot) {
        $validated = $request->validate([
            'turfID' => 'required|integer|exists:turfs,id',
            'startTime' => 'required|date',
            'endTime' => 'required|date|after:startTime',
            'status' => 'required|string|max:255',
        ]);
        $time_slot->update($validated);
        return redirect()->route('admin.time_slots.index')->with('success', 'Time slot updated successfully.');
    }
    public function destroy(TimeSlot $time_slot) {
        $time_slot->delete();
        return redirect()->route('admin.time_slots.index')->with('success', 'Time slot deleted successfully.');
    }
}
