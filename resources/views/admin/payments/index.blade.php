@extends('layouts.app')
@section('title', 'Manage Payments')
@section('content')
<div class="container py-4">
    <a href="{{ route('admin.panel') }}" class="btn btn-secondary mb-3">&larr; Back to Admin Management</a>
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
    <form method="GET" action="{{ route('admin.payments.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search payments..." value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    <h2>Payments</h2>
    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>User</th><th>Amount</th><th>Status</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->booking?->player?->name ?? 'Unknown' }}</td>
                <td>{{ $payment->amount ?? '' }}</td>
                <td>{{ $payment->status ?? '' }}</td>
                <td>
                    <a href="{{ route('admin.payments.edit', $payment) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.payments.destroy', $payment) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $payments->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
