@extends('layouts.app')
@section('title', 'Role Details')
@section('content')
<div class="container py-4">
    <h2>Role Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $role->id }}</li>
        <li class="list-group-item"><strong>Name:</strong> {{ $role->name }}</li>
        <li class="list-group-item"><strong>Description:</strong> {{ $role->description }}</li>
    </ul>
    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
