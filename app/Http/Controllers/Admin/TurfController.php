<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turf;
class TurfController extends Controller {
    public function index(Request $request) {
        $query = Turf::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('pricePerHour', 'like', "%$search%");
            });
        }
        $turfs = $query->get();
        return view('admin.turfs.index', compact('turfs'));
    }
    public function create() { return view('admin.turfs.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'pricePerHour' => 'required|numeric',
        ]);
        Turf::create($validated);
        return redirect()->route('admin.turfs.index')->with('success', 'Turf created successfully.');
    }
    public function show(Turf $turf) { return view('admin.turfs.show', compact('turf')); }
    public function edit(Turf $turf) { return view('admin.turfs.edit', compact('turf')); }
    public function update(Request $request, Turf $turf) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'pricePerHour' => 'required|numeric',
        ]);
        $turf->update($validated);
        return redirect()->route('admin.turfs.index')->with('success', 'Turf updated successfully.');
    }
    public function destroy(Turf $turf) { $turf->delete(); return redirect()->route('admin.turfs.index'); }
}
