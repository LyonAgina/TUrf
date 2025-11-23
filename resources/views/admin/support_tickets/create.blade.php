@extends('layouts.app')
@section('title', 'Add Support Ticket')
@section('content')
<div class="container py-4">
    <h2>Add Support Ticket</h2>
    <form action="{{ route('admin.support_tickets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status">
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.support_tickets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
