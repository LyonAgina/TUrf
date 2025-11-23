@extends('layouts.app')
@section('title', 'Booking Details')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Booking Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $booking->id }}</li>
        <li class="list-group-item"><strong>User ID:</strong> {{ $booking->user_id }}</li>
        <li class="list-group-item"><strong>Turf ID:</strong> {{ $booking->turf_id }}</li>
        <li class="list-group-item"><strong>Date:</strong> {{ $booking->date ?? $booking->created_at }}</li>
    </ul>
    <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
