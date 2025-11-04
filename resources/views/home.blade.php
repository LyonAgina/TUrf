@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="w-100 d-flex align-items-center justify-content-center" style="min-height:60vh;">
    <form class="w-100" style="max-width:400px;" method="GET" action="/turfs">
        <div class="card shadow-lg p-4" style="border-radius:22px;background:#fff;">
            <div class="mb-3 text-center">
                <h2 class="mb-2" style="color:#155d27;font-weight:700;">Search Turfs</h2>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search for turfs, sports, or locations" style="border-radius:14px;">
            </div>
            <button class="btn btn-primary w-100" type="submit" style="border-radius:22px;">Search</button>
        </div>
    </form>
</div>
<div class="row justify-content-center g-4">
    @forelse($turfs as $turf)
        <div class="col-lg-4 col-md-6 col-sm-10 mb-4 d-flex align-items-stretch">
            <div class="card h-100 turf-card w-100 shadow-sm" style="border-radius:18px;overflow:hidden;">
                <img src="{{ asset('images/arena1.jpg') }}" class="card-img-top" alt="{{ $turf->name }}" style="height:220px;object-fit:cover;">
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <h5 class="card-title mb-2" style="color:#155d27;font-weight:700;font-size:1.3rem;">{{ $turf->name }}</h5>
                    <p class="card-text mb-3" style="color:#1e3d1e;">
                        <i class="bi bi-geo-alt-fill me-1"></i> {{ optional($turf->location)->name ?? 'N/A' }}<br>
                        <span style="color:#155d27;font-weight:500;">KES {{ number_format($turf->pricePerHour, 0) }}/hr</span>
                    </p>
                    <a href="/turfs/{{ $turf->turfID }}" class="btn btn-outline-primary mt-auto w-100" style="border-radius:20px;">View Details</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><p>No turfs found.</p></div>
    @endforelse
</div>
@endsection
