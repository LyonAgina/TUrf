@extends('layouts.app')
@section('title', 'Manage Bookings')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 via-teal-900 to-black py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Page Header --}}
        <div class="text-center mb-12">
            <h1 class="text-5xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-green-400 drop-shadow-2xl">
                Manage Bookings
            </h1>
            <p class="mt-4 text-xl text-teal-200 font-medium">Control all turf reservations in real-time</p>
        </div>

        {{-- Back to Dashboard Button --}}
        <div class="flex justify-center mb-8">
            <a href="{{ route('admin') }}"
               class="group inline-flex items-center bg-gradient-to-r from-teal-600 to-green-600 text-white font-bold px-8 py-4 rounded-full shadow-2xl hover:shadow-green-500/50 transform hover:scale-105 transition-all duration-300">
                <svg class="w-6 h-6 mr-3 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Admin Dashboard
            </a>
        </div>

        {{-- Success / Error Alerts --}}
        @if(session('success'))
            <div class="max-w-4xl mx-auto mb-8 bg-green-900/80 border border-green-500 text-green-300 p-5 rounded-2xl shadow-xl backdrop-blur-sm flex items-center">
                <svg class="w-8 h-8 mr-3 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
                <span class="font-semibold">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="max-w-4xl mx-auto mb-8 bg-red-900/80 border border-red-500 text-red-300 p-5 rounded-2xl shadow-xl backdrop-blur-sm flex items-center">
                <svg class="w-8 h-8 mr-3 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                </svg>
                <span class="font-semibold">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Main Card --}}
        <div class="bg-gray-800/90 backdrop-blur-lg rounded-3xl shadow-2xl border-2 border-teal-500/50 overflow-hidden">
            <div class="bg-gradient-to-r from-teal-800/50 to-green-800/50 p-6 border-b border-teal-500">
                <form method="GET" action="{{ route('admin.bookings.index') }}" class="flex flex-col sm:flex-row gap-4">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search by user, turf name, phone, status..."
                           class="flex-1 px-6 py-4 bg-gray-900/80 border border-teal-400/50 rounded-xl text-white placeholder-teal-300 focus:outline-none focus:ring-4 focus:ring-teal-500/50 focus:border-teal-300 transition shadow-inner text-lg">
                    <button type="submit"
                            class="px-10 py-4 bg-gradient-to-r from-teal-500 to-green-500 text-white font-bold rounded-xl hover:from-teal-600 hover:to-green-600 transform hover:scale-105 transition shadow-xl flex items-center justify-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0  eleventh-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Search Bookings
                    </button>
                </form>
            </div>

            {{-- Bookings Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gradient-to-r from-teal-700 to-green-700 text-white text-sm uppercase tracking-wider">
                            <th class="px-6 py-5 font-bold rounded-tl-xl">Booking ID</th>
                            <th class="px-6 py-5 font-bold">Player</th>
                            <th class="px-6 py-5 font-bold">Turf</th>
                            <th class="px-6 py-5 font-bold">Date & Time</th>
                            <th class="px-6 py-5 font-bold">Status</th>
                            <th class="px-6 py-5 font-bold text-center rounded-tr-xl">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @forelse($bookings as $booking)
                            @php
                                $statusStyles = [
                                    'upcoming'   => 'bg-yellow-500/20 text-yellow-300 border border-yellow-500/50',
                                    'confirmed'  => 'bg-green-500/20 text-green-300 border border-green-500/50',
                                    'completed'  => 'bg-blue-500/20 text-blue-300 border border-blue-500/50',
                                    'cancelled'  => 'bg-red-500/20 text-red-300 border border-red-500/50',
                                ];
                                $statusClass = $statusStyles[$booking->status] ?? 'bg-gray-500/20 text-gray-400 border border-gray-500/50';
                            @endphp
                            <tr class="hover:bg-gray-700/50 transition-all duration-200 transform hover:scale-[1.005] hover:shadow-xl">
                                <td class="px-6 py-5 font-mono text-teal-400 font-bold">#{{ $booking->id }}</td>
                                <td class="px-6 py-5">
                                    <div>
                                        <p class="font-semibold text-white">
                                            {{ $booking->player?->name ?? ($booking->guestInfo ? json_decode($booking->guestInfo)->name ?? 'Guest' : 'N/A') }}
                                        </p>
                                        <p class="text-sm text-teal-300">
                                            ID: {{ $booking->playerID ?? 'Guest' }}
                                        </p>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="font-bold text-green-400">{{ $booking->turf?->name ?? 'Deleted Turf' }}</span>
                                </td>
                                <td class="px-6 py-5 text-gray-300">
                                    {{ $booking->startTime ? \Carbon\Carbon::parse($booking->startTime)->format('D, M d, Y') : '—' }}<br>
                                    <span class="text-teal-400 font-semibold">
                                        {{ $booking->startTime ? \Carbon\Carbon::parse($booking->startTime)->format('g:i A') : '' }}
                                        {{ $booking->endTime ? '– ' . \Carbon\Carbon::parse($booking->endTime)->format('g:i A') : '' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="px-4 py-2 rounded-full text-xs font-bold {{ $statusClass }}">
                                        {{ ucfirst($booking->status ?? 'unknown') }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-center space-x-3">
                                    <a href="{{ route('admin.bookings.edit', $booking->id) }}"
                                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2.5 rounded-lg shadow-lg transform hover:scale-110 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.bookings.destroy', $booking->id) }}"
                                          method="POST" class="inline-block"
                                          onsubmit="return confirm('⚠️ Delete booking #{{ $booking->id }} permanently?');">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white font-bold px-5 py-2.5 rounded-lg shadow-lg transform hover:scale-110 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-16 text-2xl text-gray-500 font-medium italic">
                                    <svg class="w-20 h-20 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-4a2 2 0 00-2 2v4m-8-6h.01"/>
                                    </svg>
                                    No bookings found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="bg-gray-800/70 px-8 py-6 border-t border-teal-500/30">
                {{ $bookings->appends(request()->query())->links('pagination::tailwind') }}
            </div>
        </div>

        {{-- Footer Note --}}
        <div class="text-center mt-12 text-teal-400 text-sm">
            <p>© {{ date('Y') }} TurfKE Admin • All bookings are securely managed</p>
        </div>
    </div>
</div>
@endsection