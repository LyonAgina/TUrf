@extends('layouts.app')
@section('title', 'Edit Support Ticket')
@section('content')
<div class="container py-4">
    <h2>Edit Support Ticket</h2>
    <form action="{{ route('admin.support_tickets.update', $support_ticket) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $support_ticket->user_id }}" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" value="{{ $support_ticket->subject }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $support_ticket->status }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.support_tickets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
