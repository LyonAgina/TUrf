@extends('layouts.app')
@section('title', 'My Bookings')
@section('content')
<div class="min-h-screen bg-gray-50 py-6">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-md shadow-sm p-6">
            <style>
                @keyframes zigzag-cool {
                    0% { transform: translate(0, 0) scale(1) rotate(0deg); filter: drop-shadow(0 0 8px #22c55e); }
                    15% { transform: translate(-30px, -18px) scale(1.08) rotate(-6deg); filter: drop-shadow(0 0 12px #22c55e); }
                    30% { transform: translate(30px, -18px) scale(1.12) rotate(6deg); filter: drop-shadow(0 0 16px #3b82f6); }
                    45% { transform: translate(-30px, -18px) scale(1.08) rotate(-6deg); filter: drop-shadow(0 0 12px #22c55e); }
                    60% { transform: translate(30px, -18px) scale(1.12) rotate(6deg); filter: drop-shadow(0 0 16px #3b82f6); }
                    75% { transform: translate(-30px, -18px) scale(1.08) rotate(-6deg); filter: drop-shadow(0 0 12px #22c55e); }
                    90% { transform: translate(0, 0) scale(1) rotate(0deg); filter: drop-shadow(0 0 8px #22c55e); }
                    100% { transform: translate(0, 0) scale(1) rotate(0deg); filter: drop-shadow(0 0 8px #22c55e); }
                }
                .zigzag-cool-animate {
                    animation: zigzag-cool 6s infinite cubic-bezier(.68,-0.55,.27,1.55);
                    display: inline-block;
                    background: linear-gradient(90deg, #22c55e, #3b82f6, #a3e635, #38bdf8, #fbbf24);
                    background-size: 200% 200%;
                    color: transparent;
                    background-clip: text;
                    -webkit-background-clip: text;
                    filter: drop-shadow(0 0 8px #22c55e);
                    position: relative;
                }
                .zigzag-cool-animate:hover {
                    background-position: 100% 0;
                    filter: drop-shadow(0 0 24px #3b82f6);
                }
                .sparkle {
                    position: absolute;
                    width: 10px;
                    height: 10px;
                    pointer-events: none;
                    border-radius: 50%;
                    background: radial-gradient(circle, #fff 60%, #22c55e 100%);
                    opacity: 0.7;
                    animation: sparkle 2.5s infinite linear;
                }
                @keyframes sparkle {
                    0% { opacity: 0.7; transform: scale(1) translateY(0); }
                    50% { opacity: 1; transform: scale(1.3) translateY(-8px); }
                    100% { transform: scale(1) translateY(0); }
                }
            </style>
            <h2 class="text-2xl sm:text-3xl font-bold text-center mb-1 tracking-wide text-gray-900 drop-shadow-lg relative" style="height: 70px;">
                <span class="zigzag-cool-animate px-4 py-1 rounded-xl transition-colors duration-300 cursor-pointer">
                    My Bookings
                    <span class="sparkle" style="top:-8px;left:-18px;"></span>
                    <span class="sparkle" style="top:-12px;right:-18px;"></span>
                    <span class="sparkle" style="bottom:-8px;left:10px;"></span>
                    <span class="sparkle" style="bottom:-12px;right:10px;"></span>
                </span>
                <span class="block mx-auto mt-2 w-16 h-1 rounded-full bg-gradient-to-r from-green-400 via-blue-500 to-purple-600"></span>
            </h2>
            @if(session('success'))
                <div id="fade-message" class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg text-center font-semibold opacity-80 transition-opacity duration-1000">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div id="fade-message" class="mb-4 p-3 bg-red-100 text-red-800 rounded-lg text-center font-semibold opacity-80 transition-opacity duration-1000">
                    {{ session('error') }}
                </div>
            @endif
            <script>
                setTimeout(function() {
                    var msg = document.getElementById('fade-message');
                    if (msg) {
                        msg.style.opacity = '0.2';
                        setTimeout(function() { msg.style.display = 'none'; }, 1000);
                    }
                }, 5000);
            </script>
            {{-- List bookings here --}}
            <div class="w-full pb-4">
                @php
                    $allBookings = array_merge($bookings['upcoming']->all(), $bookings['completed']->all(), $bookings['cancelled']->all());
                @endphp
                @if(count($allBookings) === 0)
                    <div class="flex flex-col items-center justify-center py-20 bg-gradient-to-b from-green-50 to-white rounded-2xl shadow-lg border-2 border-green-300">
                        <div class="mb-6 relative">
                            <div class="absolute -top-6 left-1/2 -translate-x-1/2">
                                <svg class="w-16 h-16 text-green-400 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                                    <circle cx="24" cy="24" r="22" stroke-width="4" stroke="#22c55e" fill="#e6ffe6"/>
                                    <path d="M12 32c0-8 24-8 24 0" stroke="#22c55e" stroke-width="3" fill="none"/>
                                    <ellipse cx="24" cy="20" rx="8" ry="6" fill="#22c55e"/>
                                </svg>
                            </div>
                            <img src="{{ asset('images/arena1.jpg') }}" alt="No bookings" class="w-32 h-32 object-cover rounded-full shadow-xl border-4 border-green-400">
                        </div>
                        <h3 class="text-3xl font-extrabold text-green-700 mb-2 tracking-tight">No Bookings Yet</h3>
                        <p class="text-lg text-gray-700 mb-4 max-w-md text-center">You haven't booked any turfs yet.<br>Discover lush green fields and premium courts for your next game!</p>
                        <a href="{{ route('turfs') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white px-7 py-3 rounded-xl font-bold shadow-lg transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            Browse Turfs
                        </a>
                        <div class="mt-8 text-green-500 text-sm font-semibold animate-pulse">Ready to play? Book your favorite turf now!</div>
                    </div>
                @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($allBookings as $booking)
                        @php
                            $turfImage = $booking->turf->image ?? null;
                            $defaultImage = asset('images/arena1.jpg');
                            $imageSource = $defaultImage;
                            if ($turfImage) {
                                if (str_starts_with($turfImage, 'http')) {
                                    $imageSource = $turfImage;
                                } else {
                                    $imageSource = asset('storage/' . $turfImage);
                                }
                            }
                        @endphp
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300 overflow-hidden border-2 border-green-200">
                            <div class="relative h-32 overflow-hidden rounded-t-2xl bg-green-100">
                                <img src="{{ $imageSource }}"
                                     alt="{{ $booking->turf ? $booking->turf->name : 'Turf' }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 border-b-4 border-green-400">
                                @if($booking->status === 'upcoming')
                                    <span class="absolute top-2 left-2 bg-green-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow">Upcoming</span>
                                @elseif($booking->status === 'completed')
                                    <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow">Completed</span>
                                @elseif($booking->status === 'cancelled')
                                    <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow">Cancelled</span>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-base font-bold text-green-800 mb-2">{{ $booking->turf ? $booking->turf->name : 'N/A' }}</h3>
                                @if($booking->turf)
                                    <div class="text-gray-700 mb-1">
                                        <span class="font-semibold">Sport:</span> <span class="bg-green-100 px-2 py-1 rounded">{{ ucfirst($booking->turf->sport) }}</span>
                                    </div>
                                    <div class="text-gray-700 mb-1">
                                        <span class="font-semibold">Price/Hour:</span> <span class="bg-green-100 px-2 py-1 rounded">Ksh {{ number_format($booking->turf->pricePerHour, 2) }}</span>
                                    </div>
                                    <div class="text-gray-700 mb-1">
                                        <a href="{{ route('turfs') }}#turf-{{ $booking->turf->turfID }}" class="text-green-700 hover:underline font-semibold">View Turf Details</a>
                                    </div>
                                @endif
                                <div class="text-gray-700 mb-2">
                                    <span class="font-semibold">Date:</span> <span class="bg-gray-100 px-2 py-1 rounded">{{ $booking->startTime }}</span>
                                </div>
                                <div class="flex items-center gap-2 mt-2">
                                    @if($booking->status === 'upcoming')
                                        <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Upcoming</span>
                                        <form method="POST" action="{{ route('bookings.turfDelete', $booking->bookingID) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-3 py-1 rounded-full text-xs ml-2">Delete Turf & Refund</button>
                                        </form>
                                    @elseif($booking->status === 'completed')
                                        <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Completed</span>
                                    @elseif($booking->status === 'cancelled')
                                        <span class="bg-red-200 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">Cancelled</span>
                                        <form method="POST" action="{{ route('bookings.delete', $booking->bookingID) }}" onsubmit="return confirm('Are you sure you want to permanently delete this cancelled booking?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-3 py-1 rounded-full text-xs ml-2">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
                </div>
            </div>
            <style>
                .snap-x::-webkit-scrollbar {
                    display: none;
                }
            </style>
        </div>
    </div>
</div>
@endsection