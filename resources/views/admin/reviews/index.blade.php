@extends('layouts.app')
@section('title', 'Manage Reviews')
@section('content')
<div class="container py-4">
    <form method="GET" action="{{ route('admin.reviews.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search reviews..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h2>Reviews</h2>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>User</th><th>Rating</th><th>Comment</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->user_id }}</td>
                <td>{{ $review->rating ?? '' }}</td>
                <td>{{ $review->comment ?? '' }}</td>
                <td>
                    <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" style="display:inline;">
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
