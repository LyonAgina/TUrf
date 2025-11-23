<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payout;
class PayoutController extends Controller {
    public function index(Request $request) {
        $query = Payout::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('user_id', 'like', "%$search%")
                  ->orWhere('amount', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%");
            });
        }
        $payouts = $query->get();
        return view('admin.payouts.index', compact('payouts'));
    }
    public function create() { return view('admin.payouts.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|numeric',
        ]);
        Payout::create($validated);
        return redirect()->route('admin.payouts.index')->with('success', 'Payout created successfully.');
    }
    public function show(Payout $payout) { return view('admin.payouts.show', compact('payout')); }
    public function edit(Payout $payout) { return view('admin.payouts.edit', compact('payout')); }
    public function update(Request $request, Payout $payout) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'amount' => 'required|numeric',
        ]);
        $payout->update($validated);
        return redirect()->route('admin.payouts.index')->with('success', 'Payout updated successfully.');
    }
    public function destroy(Payout $payout) { $payout->delete(); return redirect()->route('admin.payouts.index'); }
}
