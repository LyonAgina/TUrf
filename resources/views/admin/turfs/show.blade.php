@extends('layouts.app')
@section('title', 'Turf Details')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>Turf Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $turf->id }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $turf->name }}</li>
        <li class="list-group-item"><strong>Price Per Hour:</strong> {{ $turf->pricePerHour }}</li>
    </ul>
    <a href="{{ route('admin.turfs.edit', $turf) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.turfs.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
