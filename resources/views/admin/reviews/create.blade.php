@extends('layouts.app')
@section('title', 'Add Review')
@section('content')
<div class="container py-4">
    <h2>Add Review</h2>
    <form action="{{ route('admin.reviews.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Comment</label>
            <textarea class="form-control" id="comment" name="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
