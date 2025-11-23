<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arena;
class ArenaController extends Controller {
    public function index(Request $request) {
        $query = Arena::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%$search%");
        }
        $arenas = $query->get();
        return view('admin.arenas.index', compact('arenas'));
    }
    public function create() { return view('admin.arenas.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Arena::create($validated);
        return redirect()->route('admin.arenas.index')->with('success', 'Arena created successfully.');
    }
    public function show(Arena $arena) { return view('admin.arenas.show', compact('arena')); }
    public function edit(Arena $arena) { return view('admin.arenas.edit', compact('arena')); }
    public function update(Request $request, Arena $arena) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $arena->update($validated);
        return redirect()->route('admin.arenas.index')->with('success', 'Arena updated successfully.');
    }
    public function destroy(Arena $arena) { $arena->delete(); return redirect()->route('admin.arenas.index'); }
}
