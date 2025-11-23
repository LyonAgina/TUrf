@extends('layouts.app')
@section('title', 'Arena Details')
@section('content')
<div class="container py-4">
    <h2>Arena Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $arena->id }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $arena->name }}</li>
    </ul>
    <a href="{{ route('admin.arenas.edit', $arena) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.arenas.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
