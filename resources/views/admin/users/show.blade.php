@extends('layouts.app')
@section('title', 'User Details')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    <h2>User Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $user->id }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $user->name }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
        <li class="list-group-item"><strong>Role:</strong> {{ $user->role }}</li>
    </ul>
    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
