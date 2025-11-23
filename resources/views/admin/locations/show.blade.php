@extends('layouts.app')
@section('title', 'Location Details')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Location Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $location->id }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $location->name ?? $location->city }}</li>
    </ul>
    <a href="{{ route('admin.locations.edit', $location) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
