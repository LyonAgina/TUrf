@extends('layouts.app')
@section('title', 'Manage Support Tickets')
@section('content')
<div class="container py-4">
    <form method="GET" action="{{ route('admin.support_tickets.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search support tickets..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2>Support Tickets</h2>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>User</th><th>Subject</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($support_tickets as $support_ticket)
            <tr>
                <td>{{ $support_ticket->id }}</td>
                <td>{{ $support_ticket->user_id }}</td>
                <td>{{ $support_ticket->subject ?? '' }}</td>
                <td>{{ $support_ticket->status ?? '' }}</td>
                <td>
                    <a href="{{ route('admin.support_tickets.edit', $support_ticket) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.support_tickets.destroy', $support_ticket) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
