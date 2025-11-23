@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Admin Dashboard</h1>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text display-6">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Turfs</h5>
                    <p class="card-text display-6">{{ $turfCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Bookings</h5>
                    <p class="card-text display-6">{{ $bookingCount }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <h3>Admin Management Menu</h3>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
                {{-- <li class="list-group-item"><a href="{{ route('admin.arenas.index') }}">Manage Arenas</a></li> --}}
            <li class="list-group-item"><a href="{{ route('admin.turfs.index') }}">Manage Turfs</a></li>
            <li class="list-group-item"><a href="{{ route('admin.bookings.index') }}">Manage Bookings</a></li>
            <li class="list-group-item"><a href="{{ route('admin.locations.index') }}">Manage Locations</a></li>
                {{-- <li class="list-group-item"><a href="{{ route('admin.roles.index') }}">Manage Roles</a></li> --}}
            <li class="list-group-item"><a href="{{ route('admin.payments.index') }}">Manage Payments</a></li>
                {{-- <li class="list-group-item"><a href="{{ route('admin.payouts.index') }}">Manage Payouts</a></li> --}}
                {{-- <li class="list-group-item"><a href="{{ route('admin.reviews.index') }}">Manage Reviews</a></li> --}}
                {{-- <li class="list-group-item"><a href="{{ route('admin.support_tickets.index') }}">Manage Support Tickets</a></li> --}}
            {{-- <li class="list-group-item"><a href="{{ route('admin.time_slots.index') }}">Manage Time Slots</a></li> --}}
        </ul>
    </div>
</div>
@endsection
