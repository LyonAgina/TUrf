@extends('layouts.app')
@section('title', 'Manage Time Slots')
@section('content')
<div class="container py-4">
    <form method="GET" action="{{ route('admin.time_slots.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search time slots..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2>Time Slots</h2>
    <a href="{{ route('admin.time_slots.create') }}" class="btn btn-primary mb-2">Add Time Slot</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Turf</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($time_slots as $time_slot)
            <tr>
                <td>{{ $time_slot->id }}</td>
                <td>{{ optional($time_slot->turf)->name ?? $time_slot->turfID }}</td>
                <td>{{ $time_slot->startTime }}</td>
                <td>{{ $time_slot->endTime }}</td>
                <td>{{ $time_slot->status }}</td>
                <td>
                    <a href="{{ route('admin.time_slots.edit', $time_slot) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.time_slots.destroy', $time_slot) }}" method="POST" style="display:inline;">
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
