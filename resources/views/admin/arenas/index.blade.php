@extends('layouts.app')
@section('title', 'Manage Arenas')
@section('content')
<div class="container py-4">
    <form method="GET" action="{{ route('admin.arenas.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search arenas..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h2>Arenas</h2>
    <a href="{{ route('admin.arenas.create') }}" class="btn btn-primary mb-2">Add Arena</a>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($arenas as $arena)
            <tr>
                <td>{{ $arena->id }}</td>
                <td>{{ $arena->name }}</td>
                <td>
                    <a href="{{ route('admin.arenas.edit', $arena) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.arenas.destroy', $arena) }}" method="POST" style="display:inline;">
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
