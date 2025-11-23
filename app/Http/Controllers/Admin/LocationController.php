<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
class LocationController extends Controller {
    public function index(Request $request) {
        $query = Location::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('city', 'like', "%$search%")
                  ->orWhere('neighborhood', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%")
                  ->orWhere('googleMapsLink', 'like', "%$search%");
            });
        }
        $locations = $query->get();
        return view('admin.locations.index', compact('locations'));
    }
    public function create() { return view('admin.locations.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'city' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'googleMapsLink' => 'nullable|string|max:255',
        ]);
        Location::create($validated);
        return redirect()->route('admin.locations.index')->with('success', 'Location created successfully.');
    }
    public function show(Location $location) { return view('admin.locations.show', compact('location')); }
    public function edit(Location $location) { return view('admin.locations.edit', compact('location')); }
    public function update(Request $request, Location $location) {
        $validated = $request->validate([
            'city' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'googleMapsLink' => 'nullable|string|max:255',
        ]);
        $location->update($validated);
        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully.');
    }
    public function destroy(Location $location) { $location->delete(); return redirect()->route('admin.locations.index'); }
}
