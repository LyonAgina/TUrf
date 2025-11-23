@extends('layouts.app')
@section('title', 'Edit Review')
@section('content')
<div class="container py-4">
    <h2>Edit Review</h2>
    <form action="{{ route('admin.reviews.update', $review) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $review->user_id }}" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" value="{{ $review->rating }}" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" id="comment" name="comment">{{ $review->comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
