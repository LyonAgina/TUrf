@extends('layouts.app')
@section('title', 'Manage Turfs')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form method="GET" action="{{ route('admin.turfs.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search turfs..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h2>Turfs</h2>
    <a href="{{ route('admin.turfs.create') }}" class="btn btn-primary mb-2">Add Turf</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Price/hr</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($turfs as $turf)
            <tr>
                <td>{{ $turf->id }}</td>
                <td>{{ $turf->name }}</td>
                <td>{{ $turf->pricePerHour }}</td>
                <td>
                    <a href="{{ route('admin.turfs.edit', $turf) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.turfs.destroy', $turf) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
