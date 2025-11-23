@extends('layouts.app')
@section('title', 'Manage Payouts')
@section('content')
<div class="container py-4">
    <form method="GET" action="{{ route('admin.payouts.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search payouts..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h2>Payouts</h2>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>User</th><th>Amount</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($payouts as $payout)
            <tr>
                <td>{{ $payout->id }}</td>
                <td>{{ $payout->user_id }}</td>
                <td>{{ $payout->amount ?? '' }}</td>
                <td>{{ $payout->status ?? '' }}</td>
                <td>
                    <a href="{{ route('admin.payouts.edit', $payout) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.payouts.destroy', $payout) }}" method="POST" style="display:inline;">
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
