@extends('layouts.app')
@section('title', 'Manage Locations')
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
    <form method="GET" action="{{ route('admin.locations.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search locations..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h2>Locations</h2>
    <a href="{{ route('admin.locations.create') }}" class="btn btn-primary mb-2">Add Location</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>City</th>
                <th>Neighborhood</th>
                <th>Address</th>
                <th>Google Maps Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->city }}</td>
                <td>{{ $location->neighborhood }}</td>
                <td>{{ $location->address }}</td>
                <td>
                    @if($location->googleMapsLink)
                        <a href="{{ $location->googleMapsLink }}" target="_blank">Map</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.locations.edit', $location) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.locations.destroy', $location) }}" method="POST" style="display:inline;">
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
