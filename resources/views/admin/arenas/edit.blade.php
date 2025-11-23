@extends('layouts.app')
@section('title', 'Edit Arena')
@section('content')
<div class="container py-4">
    <h2>Edit Arena</h2>
    <form action="{{ route('admin.arenas.update', $arena) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $arena->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.arenas.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
