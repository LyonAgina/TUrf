@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container">
    <h2 class="mb-4">My Profile</h2>
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">{{ Auth::user()->name ?? 'User Name' }}</h5>
            <p class="card-text">Email: {{ Auth::user()->email ?? 'user@email.com' }}</p>
            <p class="card-text">Phone: {{ Auth::user()->phone ?? 'N/A' }}</p>
            <a href="#" class="btn btn-outline-primary">Edit Profile</a>
        </div>
    </div>
    <h4>Booking History</h4>
    <!-- Example Booking History -->
    <ul class="list-group">
        <li class="list-group-item">Arena Name - 2025-11-01 - Football</li>
        <!-- Repeat for more bookings -->
    </ul>
</div>
@endsection
