@extends('layouts.app')
@section('title', 'Add Arena')
@section('content')
<div class="container py-4">
    <h2>Add Arena</h2>
    <form action="{{ route('admin.arenas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.arenas.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
