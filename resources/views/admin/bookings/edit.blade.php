@extends('layouts.app')
@section('title', 'Edit Booking')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Edit Booking</h2>
    <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $booking->user_id }}" required>
        </div>
        <div class="mb-3">
            <label for="turf_id" class="form-label">Turf ID</label>
            <input type="number" class="form-control" id="turf_id" name="turf_id" value="{{ $booking->turf_id }}" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $booking->date ?? '' }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
