@extends('layouts.app')

@section('title', 'Turfs')

@section('content')
<div class="container">
    <h2 class="mb-4">Available Turfs</h2>
    <div class="row">
        @forelse($turfs as $turf)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card h-100 turf-card w-100 shadow-sm" style="border-radius:18px;overflow:hidden;">
                    <img src="{{ asset('images/arena1.jpg') }}" class="card-img-top" alt="{{ $turf->name }} Turf" style="height:220px;object-fit:cover;">
                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <h5 class="card-title mb-2" style="color:#155d27;font-weight:700;font-size:1.3rem;">{{ $turf->name }}</h5>
                        <p class="card-text mb-3" style="color:#1e3d1e;">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ optional($turf->location)->location ?? 'N/A' }}<br>
                            <span style="color:#155d27;font-weight:500;">KES {{ number_format($turf->pricePerHour, 0) }}/hr</span>
                        </p>
                        <div class="d-flex flex-column gap-2 mt-auto">
                            <a href="/bookings/create?turf={{ $turf->id }}" class="btn btn-success w-100" style="border-radius:20px;">Book Now</a>
                            <a href="/turfs/{{ $turf->id }}" class="btn btn-outline-primary w-100" style="border-radius:20px;">View Details</a>
                            @auth
                                <a href="/turfs/{{ $turf->id }}/edit" class="btn btn-outline-warning w-100" style="border-radius:20px;">Edit</a>
                                <form action="/turfs/{{ $turf->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100" style="border-radius:20px;">Delete</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12"><p>No turfs found.</p></div>
        @endforelse
    </div>
</div>
@endsection
