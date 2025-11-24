@extends('layouts.app')
@section('title', 'Manage Bookings')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin.panel') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="GET" action="{{ route('admin.bookings.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search bookings..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h2>Bookings</h2>
    @if(request('search'))
        <div class="alert alert-info">Search: <strong>{{ request('search') }}</strong> &mdash; Results: <strong>{{ $bookings->total() }}</strong></div>
    @endif
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>User</th><th>Turf</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->bookingID }}</td>
                <td>{{ $booking->player?->name ?? 'Guest' }}</td>
                <td>{{ $booking->turf?->name ?? 'Deleted Turf' }}</td>
                <td>{{ $booking->startTime ?? $booking->created_at }}</td>
                <td>{{ $booking->status ?? '' }}</td>
                <td>
                    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $bookings->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
