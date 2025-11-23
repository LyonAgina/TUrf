@extends('layouts.app')
@section('title', 'Add Payout')
@section('content')
<div class="container py-4">
    <h2>Add Payout</h2>
    <form action="{{ route('admin.payouts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.payouts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
