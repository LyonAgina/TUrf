@extends('layouts.app')
@section('title', 'Add Turf')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin.panel') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Add Turf</h2>
    <form action="{{ route('admin.turfs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="pricePerHour" class="form-label">Price Per Hour</label>
            <input type="number" class="form-control" id="pricePerHour" name="pricePerHour" required step="any">
        </div>
        <div class="mb-3">
            <label for="locationID" class="form-label">Location</label>
            <select class="form-control" id="locationID" name="locationID" required>
                <option value="">Select Location</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->city }} - {{ $location->neighborhood }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Turf Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.turfs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
