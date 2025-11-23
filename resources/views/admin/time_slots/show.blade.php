@extends('layouts.app')
@section('title', 'Time Slot Details')
@section('content')
<div class="container py-4">
    <h2>Time Slot Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $time_slot->id }}</li>
        <li class="list-group-item"><strong>Start:</strong> {{ $time_slot->start }}</li>
        <li class="list-group-item"><strong>End:</strong> {{ $time_slot->end }}</li>
    </ul>
    <a href="{{ route('admin.time_slots.edit', $time_slot) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.time_slots.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
