@extends('layouts.app')

@section('title', 'Turfs & Arenas')

@section('content')
<div class="container">
    <h2 class="mb-4">Available Arenas</h2>
    <div class="row">
        @forelse($turfs as $turf)
            <div class="col-md-4 mb-4">
                <div class="card h-100 turf-card">
                    <img src="{{ asset('images/arena1.jpg') }}" class="card-img-top" alt="{{ $turf->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $turf->name }}</h5>
                        <p class="card-text">
                            Location: {{ optional($turf->location)->name ?? 'N/A' }}<br>
                            Price: KES {{ number_format($turf->pricePerHour, 0) }}/hr
                        </p>
                        <a href="/turfs/{{ $turf->turfID }}" class="btn btn-outline-primary">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12"><p>No turfs found.</p></div>
        @endforelse
    </div>
</div>
@endsection
