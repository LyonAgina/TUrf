<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller {
    public function index(Request $request) {
        $query = Payment::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('amount', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%")
                  ->orWhereHas('booking.player', function($uq) use ($search) {
                      $uq->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%");
                  });
            });
        }
        $payments = $query->paginate(10);
        return view('admin.payments.index', compact('payments'));
    }
    public function create() { return view('admin.payments.create'); }
    public function store(Request $request) { /* validation & create logic */ }
    public function show(Payment $payment) { return view('admin.payments.show', compact('payment')); }
    public function edit(Payment $payment) { return view('admin.payments.edit', compact('payment')); }
    public function update(Request $request, Payment $payment) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,userID',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|string',
        ]);
        // Update via booking relationship
        if ($payment->booking) {
            $payment->booking->playerID = $validated['user_id'];
            $payment->booking->save();
        }
        $payment->amount = $validated['amount'];
        $payment->status = $validated['status'];
        $payment->save();
        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully.');
    }
    public function destroy(Payment $payment) { $payment->delete(); return redirect()->route('admin.payments.index'); }
}
