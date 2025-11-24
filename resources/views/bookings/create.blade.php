@extends('layouts.app')
@section('title', 'Book Turf')
@section('content')

@php
    // Pre-fill user details
    $userName  = auth()->check() ? auth()->user()->name : old('name');
    $userEmail = auth()->check() ? auth()->user()->email : old('email');
    $userPhone = old('phone');

    // Determine which turf to show (priority: URL query 'turfID' → first available)
    $turf = null;
    if (request()->filled('turfID')) {
        $turf = $turfs->firstWhere('turfID', request('turfID'));
    }
    $turf = $turf ?? $turfs->first();
@endphp

{{-- Global Error Display --}}
@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 mx-auto max-w-xl">
        <strong class="font-bold">Whoops! Something went wrong.</strong>
        <ul class="mt-2 list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="min-h-screen bg-gray-50 py-6">
    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-md shadow-sm p-6">
            <h2 class="text-2xl font-bold mb-6 text-center">Book Turf</h2>

            <form method="POST" action="{{ route('bookings.store') }}" class="space-y-5">
                @csrf

                {{-- Selected Turf - Read Only (No Dropdown) --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Selected Turf
                    </label>

                    @if($turf)
                        <div class="flex items-center gap-3">
                            <input type="text"
                                   value="{{ $turf->name }}"
                                   class="block w-full rounded-md border-gray-300 bg-gray-100 px-3 py-2 cursor-not-allowed"
                                   disabled>

                            <a href="{{ route('turfs') }}"
                               class="whitespace-nowrap bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-md text-sm font-semibold transition">
                                Change Turf
                            </a>
                        </div>

                        <input type="hidden" name="turfID" value="{{ $turf->turfID }}">
                    @else
                        <div class="text-red-600 font-medium">
                            No turf available. Please contact admin.
                        </div>
                    @endif
                </div>

                {{-- User Details --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Your Name</label>
                    <input type="text" name="name" value="{{ $userName }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ $userEmail }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" value="{{ $userPhone }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Payment Information</label>
                    <input type="text" name="payment_info" value="{{ old('payment_info') }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500"
                           placeholder="e.g. M-Pesa transaction code" required>
                </div>

                <button type="submit"
                        class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold transition duration-200">
                    Confirm Booking
                </button>
            </form>
        </div>
    </div>
</div>
@endsection