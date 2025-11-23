@extends('layouts.app')
@section('title', 'Add Turf')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Add Turf</h2>
    <form action="{{ route('admin.turfs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="pricePerHour" class="form-label">Price Per Hour</label>
            <input type="number" class="form-control" id="pricePerHour" name="pricePerHour" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.turfs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
