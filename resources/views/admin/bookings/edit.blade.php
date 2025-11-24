@extends('layouts.app')
@section('title', 'Edit Booking')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin.panel') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Edit Booking</h2>
    <form action="{{ route('admin.bookings.update', $booking) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->userID }}" {{ $booking->playerID == $user->userID ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="turf_id" class="form-label">Turf</label>
            <select class="form-control" id="turf_id" name="turf_id" required>
                @foreach($turfs as $turf)
                    <option value="{{ $turf->turfID }}" {{ $booking->turfID == $turf->turfID ? 'selected' : '' }}>{{ $turf->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="startTime" class="form-label">Start Time</label>
            <input type="datetime-local" class="form-control" id="startTime" name="startTime" value="{{ $booking->startTime ? date('Y-m-d\TH:i', strtotime($booking->startTime)) : '' }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
