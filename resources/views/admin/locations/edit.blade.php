@extends('layouts.app')
@section('title', 'Edit Location')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Edit Location</h2>
    <form action="{{ route('admin.locations.update', $location) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $location->city }}" required>
        </div>
        <div class="mb-3">
            <label for="neighborhood" class="form-label">Neighborhood</label>
            <input type="text" class="form-control" id="neighborhood" name="neighborhood" value="{{ $location->neighborhood }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $location->address }}" required>
        </div>
        <div class="mb-3">
            <label for="googleMapsLink" class="form-label">Google Maps Link</label>
            <input type="text" class="form-control" id="googleMapsLink" name="googleMapsLink" value="{{ $location->googleMapsLink }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
