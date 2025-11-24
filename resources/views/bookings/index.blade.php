@extends('layouts.app')

@section('title', 'My Bookings')

@section('content')
<div class="min-h-screen bg-gray-50 py-6 relative overflow-hidden">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-md shadow-sm p-6">
            <style>
                /* Existing Styles */
                @keyframes zigzag-cool { 0%,100%{transform:translate(0,0) scale(1) rotate(0deg);filter:drop-shadow(0 0 8px #22c55e)} 15%{transform:translate(-30px,-18px) scale(1.08) rotate(-6deg);filter:drop-shadow(0 0 12px #22c55e)} 30%{transform:translate(30px,-18px) scale(1.12) rotate(6deg);filter:drop-shadow(0 0 16px #3b82f6)} 45%{transform:translate(-30px,-18px) scale(1.08) rotate(-6deg);filter:drop-shadow(0 0 12px #22c55e)} 60%{transform:translate(30px,-18px) scale(1.12) rotate(6deg);filter:drop-shadow(0 0 16px #3b82f6)} 75%{transform:translate(-30px,-18px) scale(1.08) rotate(-6deg);filter:drop-shadow(0 0 12px #22c55e)} 90%,100%{transform:translate(0,0) scale(1) rotate(0deg);filter:drop-shadow(0 0 8px #22c55e)} }
                .zigzag-cool-animate { animation: zigzag-cool 6s infinite cubic-bezier(.68,-0.55,.27,1.55); display: inline-block; background: linear-gradient(90deg, #22c55e, #3b82f6, #a3e635, #38bdf8, #fbbf24); background-size: 200% 200%; color: transparent; background-clip: text; -webkit-background-clip: text; filter: drop-shadow(0 0 8px #22c55e); position: relative; }
                .zigzag-cool-animate:hover { background-position: 100% 0; filter: drop-shadow(0 0 24px #3b82f6); }
                .sparkle { position: absolute; width: 10px; height: 10px; pointer-events: none; border-radius: 50%; background: radial-gradient(circle, #fff 60%, #22c55e 100%); opacity: 0.7; animation: sparkle 2.5s infinite linear; }
                @keyframes sparkle { 0% { opacity: 0.7; transform: scale(1) translateY(0); } 50% { opacity: 1; transform: scale(1.3) translateY(-8px); } 100% { transform: scale(1) translateY(0); } }
                
                /* --- EXISTING ORBIT BALLS (Initial State) --- */
                .orbit-ball {
                    position: absolute;
                    border-radius: 50%;
                    opacity: 0.85;
                    box-shadow: 0 0 24px #22c55e55;
                    transition: transform 0.5s ease-out; 
                }
                .orbit-football {
                    width: 48px; height: 48px;
                    background: url('/images/football.png') center/cover, #22c55e;
                    /* Initial position will be overridden by inline style: top: 0; left: 0; */
                    animation: orbit-move-1 8s infinite linear;
                }
                .orbit-basketball {
                    width: 40px; height: 40px;
                    background: url('/images/basketball.png') center/cover, #fbbf24;
                    /* Initial position will be overridden by inline style: top: 0; right: 0; */
                    animation: orbit-move-2 10s infinite linear;
                }
                .orbit-volleyball {
                    width: 44px; height: 44px;
                    background: url('/images/volleyball.png') center/cover, #38bdf8;
                    /* Initial position will be overridden by inline style: bottom: 0; left: 0; */
                    animation: orbit-move-3 12s infinite linear;
                }
                /* These orbits are now just placeholder animations and are overridden on hover */
                @keyframes orbit-move-1 { 0%{left:10%;top:80%;} 50%{left:80%;top:20%;} 100%{left:10%;top:80%;} }
                @keyframes orbit-move-2 { 0%{left:80%;top:20%;} 50%{left:40%;top:80%;} 100%{left:80%;top:20%;} }
                @keyframes orbit-move-3 { 0%{left:40%;top:10%;} 50%{left:10%;top:60%;} 100%{left:40%;top:10%;} }

                /* --- BUTTON STYLES & BALL HOVER ANIMATION --- */

                .own-turf-pulse {
                    animation: pulse-green 2s infinite ease-in-out;
                }
                @keyframes pulse-green {
                    0%, 100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); } 
                    50% { box-shadow: 0 0 0 15px rgba(34, 197, 94, 0); }
                }

                /* Keyframes for balls flying towards the button (right-8 bottom-8) */
                /* Target: top: calc(100vh - 4.5rem), left: calc(100vw - 4.5rem) */

                /* Note: We use fixed values for 100% to ensure they converge precisely */
                @keyframes fly-to-button-tl {
                    0% { top: 0; left: 0; transform: scale(1); }
                    100% { top: calc(100vh - 4.5rem); left: calc(100vw - 4.5rem); transform: scale(0.5); }
                }

                @keyframes fly-to-button-tr {
                    0% { top: 0; right: 0; transform: scale(1); }
                    100% { top: calc(100vh - 4.5rem); right: calc(100vw - 4.5rem); transform: scale(0.5); }
                }

                @keyframes fly-to-button-bl {
                    0% { bottom: 0; left: 0; transform: scale(1); top: auto;} /* added top: auto to prevent conflict */
                    100% { bottom: calc(100vh - 4.5rem); left: calc(100vw - 4.5rem); transform: scale(0.5); }
                }

                /* Container for balls */
                .ball-container {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    pointer-events: none;
                    z-index: 40;
                }
                
                /* Hover effect: Set identical animation for simultaneous arrival */
                .own-turf-button:hover ~ .ball-container .orbit-football {
                    animation: fly-to-button-tl 1.2s forwards; /* Same duration */
                    top: 0 !important; left: 0 !important;
                }
                .own-turf-button:hover ~ .ball-container .orbit-basketball {
                    animation: fly-to-button-tr 1.2s forwards; /* Same duration */
                    top: 0 !important; right: 0 !important; 
                }
                .own-turf-button:hover ~ .ball-container .orbit-volleyball {
                    animation: fly-to-button-bl 1.2s forwards; /* Same duration */
                    bottom: 0 !important; left: 0 !important; 
                    top: auto !important; 
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

            {{-- Status Messages (kept as is) --}}
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

            {{-- List bookings here (kept as is) --}}
            <div class="w-full pb-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach(array_merge($bookings['upcoming']->all(), $bookings['completed']->all(), $bookings['cancelled']->all()) as $booking)
                        
                        @php
                            // ... (Image Source Logic is unchanged)
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

                        <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300 overflow-hidden">
                            <div class="relative h-32 overflow-hidden rounded-t-2xl bg-gray-200">
                                
                                {{-- IMAGE DISPLAY --}}
                                <img src="{{ $imageSource }}" 
                                        alt="{{ $booking->turf ? $booking->turf->name : 'Turf' }}" 
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                
                                @if($booking->status === 'upcoming')
                                    <span class="absolute top-2 left-2 bg-green-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow">Upcoming</span>
                                @elseif($booking->status === 'completed')
                                    <span class="absolute top-2 left-2 bg-blue-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow">Completed</span>
                                @elseif($booking->status === 'cancelled')
                                    <span class="absolute top-2 left-2 bg-red-600 text-white text-xs px-3 py-1 rounded-full font-bold shadow">Cancelled</span>
                                @endif
                            </div>
                            <div class="p-4">
                                <h3 class="text-base font-bold text-gray-800 mb-2">{{ $booking->turf ? $booking->turf->name : 'N/A' }}</h3>
                                @if($booking->turf)
                                    <div class="text-gray-700 mb-1">
                                        <span class="font-semibold">Sport:</span> <span class="bg-green-100 px-2 py-1 rounded">{{ ucfirst($booking->turf->sport) }}</span>
                                    </div>
                                    <div class="text-gray-700 mb-1">
                                        <span class="font-semibold">Price/Hour:</span> <span class="bg-green-100 px-2 py-1 rounded">Ksh {{ number_format($booking->turf->pricePerHour, 2) }}</span>
                                    </div>
                                    <div class="text-gray-700 mb-1">
                                        <a href="{{ route('turfs') }}#turf-{{ $booking->turf->turfID }}" class="text-blue-600 hover:underline font-semibold">View Turf Details</a>
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
            </div>
            <style>
                .snap-x::-webkit-scrollbar {
                    display: none;
                }
            </style>
        </div>
    </div>

    {{-- 
        UPDATED ELEMENT: Floating Action Button 
        Removed 'hidden' from md:inline to ensure the label is always visible.
    --}}
    <a href="{{ route('turfs') }}" 
       class="own-turf-button fixed right-8 bottom-8 z-50 p-4 pl-6 rounded-full bg-green-600 text-white font-bold shadow-xl hover:bg-green-700 transition duration-300 own-turf-pulse flex items-center gap-2"
       title="Own a Turf">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm10 2a2 2 0 100 4 2 2 0 000-4zM7 10a3 3 0 116 0 3 3 0 01-6 0z" clip-rule="evenodd" />
        </svg>
        <span>Own a Turf</span>
    </a>

    {{-- 
        Ball Container
        The initial positions are set inline to ensure the fly-to-button animation starts from the exact corner points.
    --}}
    <div class="ball-container">
        <div class="orbit-ball orbit-football" style="top: 0; left: 0;"></div>
        <div class="orbit-ball orbit-basketball" style="top: 0; right: 0;"></div>
        <div class="orbit-ball orbit-volleyball" style="bottom: 0; left: 0;"></div>
    </div>

</div>
@endsection