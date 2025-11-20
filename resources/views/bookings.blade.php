@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<div class="w-100 d-flex align-items-center justify-content-center" style="min-height:60vh;">
    <div class="w-100" style="max-width:600px;">
        <div class="card shadow-lg p-4" style="border-radius:22px;background:#fff;">
            <h2 class="mb-4 text-center" style="color:#155d27;font-weight:700;">My Bookings</h2>
            <ul class="nav nav-tabs mb-3 justify-content-center" id="bookingTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="upcoming-tab" data-bs-toggle="tab" data-bs-target="#upcoming" type="button" role="tab">Upcoming</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab">Completed</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab">Cancelled</button>
                </li>
            </ul>
            <div class="tab-content" id="bookingTabsContent">
                <div class="tab-pane fade show active" id="upcoming" role="tabpanel">
                    @forelse($bookings['upcoming'] as $booking)
                        <div class="card mb-3 turf-card w-100 mx-auto shadow-sm" style="border-radius:14px;overflow:hidden;">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/arena1.jpg') }}" class="img-fluid rounded-start" alt="{{ $booking->turf->name ?? 'Turf' }}" style="height:120px;object-fit:cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <h5 class="card-title mb-2" style="color:#155d27;font-weight:700;">{{ $booking->turf->name ?? 'Turf' }}</h5>
                                        <p class="card-text mb-2" style="color:#1e3d1e;">
                                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $booking->turf->location ?? 'N/A' }}<br>
                                            <span style="color:#1e3d1e;">Date:</span> {{ \Carbon\Carbon::parse($booking->startTime)->format('Y-m-d') }}<br>
                                            <span style="color:#1e3d1e;">Time:</span> {{ \Carbon\Carbon::parse($booking->startTime)->format('h:i A') }}<br>
                                            <span style="color:#1e3d1e;">Sport:</span> {{ $booking->turf->sport ?? 'N/A' }}
                                        </p>
                                        <span class="badge bg-success">Upcoming</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted">No upcoming bookings.</div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel">
                    @forelse($bookings['completed'] as $booking)
                        <div class="card mb-3 turf-card w-100 mx-auto shadow-sm" style="border-radius:14px;overflow:hidden;opacity:0.85;">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/arena1.jpg') }}" class="img-fluid rounded-start" alt="{{ $booking->turf->name ?? 'Turf' }}" style="height:120px;object-fit:cover;filter:grayscale(0.5);">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <h5 class="card-title mb-2" style="color:#155d27;font-weight:700;">{{ $booking->turf->name ?? 'Turf' }}</h5>
                                        <p class="card-text mb-2" style="color:#1e3d1e;">
                                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $booking->turf->location ?? 'N/A' }}<br>
                                            <span style="color:#1e3d1e;">Date:</span> {{ \Carbon\Carbon::parse($booking->startTime)->format('Y-m-d') }}<br>
                                            <span style="color:#1e3d1e;">Time:</span> {{ \Carbon\Carbon::parse($booking->startTime)->format('h:i A') }}<br>
                                            <span style="color:#1e3d1e;">Sport:</span> {{ $booking->turf->sport ?? 'N/A' }}
                                        </p>
                                        <span class="badge bg-secondary">Completed</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted">No completed bookings.</div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="cancelled" role="tabpanel">
                    @forelse($bookings['cancelled'] as $booking)
                        <div class="card mb-3 turf-card w-100 mx-auto shadow-sm" style="border-radius:14px;overflow:hidden;opacity:0.7;">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/arena1.jpg') }}" class="img-fluid rounded-start" alt="{{ $booking->turf->name ?? 'Turf' }}" style="height:120px;object-fit:cover;filter:grayscale(1);">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body text-start">
                                        <h5 class="card-title mb-2" style="color:#155d27;font-weight:700;">{{ $booking->turf->name ?? 'Turf' }}</h5>
                                        <p class="card-text mb-2" style="color:#1e3d1e;">
                                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $booking->turf->location ?? 'N/A' }}<br>
                                            <span style="color:#1e3d1e;">Date:</span> {{ \Carbon\Carbon::parse($booking->startTime)->format('Y-m-d') }}<br>
                                            <span style="color:#1e3d1e;">Time:</span> {{ \Carbon\Carbon::parse($booking->startTime)->format('h:i A') }}<br>
                                            <span style="color:#1e3d1e;">Sport:</span> {{ $booking->turf->sport ?? 'N/A' }}
                                        </p>
                                        <span class="badge bg-danger">Cancelled</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted">No cancelled bookings.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
