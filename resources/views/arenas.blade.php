@extends('layouts.app')

@section('title', 'Arenas')

@section('content')
<div class="container">
    <h2 class="mb-4">Available Arenas</h2>
    <div class="row">
        @forelse($arenas as $arena)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card h-100 arena-card w-100 shadow-sm" style="border-radius:18px;overflow:hidden;">
                    <img src="{{ asset('images/arena1.jpg') }}" class="card-img-top" alt="{{ $arena->name }} Arena" style="height:220px;object-fit:cover;">
                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <h5 class="card-title mb-2" style="color:#155d27;font-weight:700;font-size:1.3rem;">{{ $arena->name }}</h5>
                        <p class="card-text mb-3" style="color:#1e3d1e;">
                            <i class="bi bi-geo-alt-fill me-1"></i> {{ $arena->location ?? 'N/A' }}<br>
                            <span style="color:#155d27;font-weight:500;">Capacity: {{ $arena->capacity }}</span>
                        </p>
                        <div class="d-flex flex-column gap-2 mt-auto">
                            <a href="/arenas/{{ $arena->id }}" class="btn btn-outline-primary w-100" style="border-radius:20px;">View Details</a>
                            @auth
                                <a href="/arenas/{{ $arena->id }}/edit" class="btn btn-outline-warning w-100" style="border-radius:20px;">Edit</a>
                                <form action="/arenas/{{ $arena->id }}" method="POST" class="d-inline">
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
            <div class="col-12"><p>No arenas found.</p></div>
        @endforelse
    </div>
</div>
@endsection
