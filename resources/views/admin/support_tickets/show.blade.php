@extends('layouts.app')
@section('title', 'Support Ticket Details')
@section('content')
<div class="container py-4">
    <h2>Support Ticket Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $support_ticket->id }}</li>
        <li class="list-group-item"><strong>User ID:</strong> {{ $support_ticket->user_id }}</li>
        <li class="list-group-item"><strong>Subject:</strong> {{ $support_ticket->subject }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $support_ticket->status }}</li>
    </ul>
    <a href="{{ route('admin.support_tickets.edit', $support_ticket) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.support_tickets.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
