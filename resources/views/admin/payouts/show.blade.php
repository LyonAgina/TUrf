@extends('layouts.app')
@section('title', 'Payout Details')
@section('content')
<div class="container py-4">
    <h2>Payout Details</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $payout->id }}</li>
        <li class="list-group-item"><strong>User ID:</strong> {{ $payout->user_id }}</li>
        <li class="list-group-item"><strong>Amount:</strong> {{ $payout->amount }}</li>
    </ul>
    <a href="{{ route('admin.payouts.edit', $payout) }}" class="btn btn-warning mt-3">Edit</a>
    <a href="{{ route('admin.payouts.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
