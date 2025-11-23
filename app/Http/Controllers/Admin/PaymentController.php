<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller {
    public function index() {
        $payments = \App\Models\Payment::with(['booking.player', 'booking.turf'])->get();
        return view('admin.payments.index', compact('payments'));
    }
    public function create() { return view('admin.payments.create'); }
    public function store(Request $request) { /* validation & create logic */ }
    public function show(Payment $payment) { return view('admin.payments.show', compact('payment')); }
    public function edit(Payment $payment) { return view('admin.payments.edit', compact('payment')); }
    public function update(Request $request, Payment $payment) { /* validation & update logic */ }
    public function destroy(Payment $payment) { $payment->delete(); return redirect()->route('admin.payments.index'); }
}
