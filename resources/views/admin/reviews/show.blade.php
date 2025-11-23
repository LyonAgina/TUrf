@extends('layouts.app')
@section('title', 'Review Details')
@section('content')
<div class="container py-4">
    <h2>Review Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $review->id }}</li>
        <li class="list-group-item"><strong>User ID:</strong> {{ $review->user_id }}</li>
        <li class="list-group-item"><strong>Rating:</strong> {{ $review->rating }}</li>
        <li class="list-group-item"><strong>Comment:</strong> {{ $review->comment }}</li>
    </ul>
    <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
