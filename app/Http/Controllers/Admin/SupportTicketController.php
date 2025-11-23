<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
class SupportTicketController extends Controller {
    public function index(Request $request) {
        $query = SupportTicket::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('user_id', 'like', "%$search%")
                  ->orWhere('subject', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%");
            });
        }
        $support_tickets = $query->get();
        return view('admin.support_tickets.index', compact('support_tickets'));
    }
    public function create() { return view('admin.support_tickets.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'subject' => 'required|string|max:255',
            'status' => 'nullable|string',
        ]);
        SupportTicket::create($validated);
        return redirect()->route('admin.support_tickets.index')->with('success', 'Support ticket created successfully.');
    }
    public function show(SupportTicket $support_ticket) { return view('admin.support_tickets.show', compact('support_ticket')); }
    public function edit(SupportTicket $support_ticket) { return view('admin.support_tickets.edit', compact('support_ticket')); }
    public function update(Request $request, SupportTicket $support_ticket) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'subject' => 'required|string|max:255',
            'status' => 'nullable|string',
        ]);
        $support_ticket->update($validated);
        return redirect()->route('admin.support_tickets.index')->with('success', 'Support ticket updated successfully.');
    }
    public function destroy(SupportTicket $support_ticket) {
        $support_ticket->delete();
        return redirect()->route('admin.support_tickets.index')->with('success', 'Support ticket deleted successfully.');
    }
}
