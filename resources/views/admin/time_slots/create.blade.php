@extends('layouts.app')
@section('title', 'Add Time Slot')
@section('content')
<div class="container py-4">
    <h2>Add Time Slot</h2>
    <form action="{{ route('admin.time_slots.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="turfID" class="form-label">Turf</label>
            <select class="form-control" id="turfID" name="turfID" required>
                <option value="">Select Turf</option>
                @foreach($turfs as $turf)
                    <option value="{{ $turf->id }}">{{ $turf->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="startTime" class="form-label">Start Time</label>
            <input type="text" class="form-control" id="startTime" name="startTime" placeholder="YYYY-MM-DD HH:MM:SS" required>
            <small class="form-text text-muted">Format: YYYY-MM-DD HH:MM:SS (e.g., 2025-11-23 10:00:00)</small>
        </div>
        <div class="mb-3">
            <label for="endTime" class="form-label">End Time</label>
            <input type="text" class="form-control" id="endTime" name="endTime" placeholder="YYYY-MM-DD HH:MM:SS" required>
            <small class="form-text text-muted">Format: YYYY-MM-DD HH:MM:SS (e.g., 2025-11-23 11:00:00)</small>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.time_slots.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
