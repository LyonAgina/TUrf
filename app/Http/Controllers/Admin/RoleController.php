<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
class RoleController extends Controller {
    public function index(Request $request) {
        $query = Role::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('description', 'like', "%$search%");
            });
        }
        $roles = $query->get();
        return view('admin.roles.index', compact('roles'));
    }
    public function create() { return view('admin.roles.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Role::create($validated);
        return redirect()->route('admin.roles.index')->with('success', 'Role created successfully.');
    }
    public function show(Role $role) { return view('admin.roles.show', compact('role')); }
    public function edit(Role $role) { return view('admin.roles.edit', compact('role')); }
    public function update(Request $request, Role $role) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $role->update($validated);
        return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully.');
    }
    public function destroy(Role $role) { $role->delete(); return redirect()->route('admin.roles.index'); }
}
