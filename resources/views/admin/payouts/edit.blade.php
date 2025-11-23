@extends('layouts.app')
@section('title', 'Edit Payout')
@section('content')
<div class="container py-4">
    <h2>Edit Payout</h2>
    <form action="{{ route('admin.payouts.update', $payout) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="user_id" class="form-label">User ID</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $payout->user_id }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $payout->amount }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('admin.payouts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
