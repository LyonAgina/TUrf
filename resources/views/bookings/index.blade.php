@extends('layouts.app')
@section('title', 'My Bookings')
@section('content')
<div class="min-h-screen bg-gray-50 py-6">
  <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-md shadow-sm p-6">
      <h2 class="text-2xl font-bold mb-4 text-center">My Bookings</h2>
      @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded-lg text-center font-semibold">
          {{ session('success') }}
        </div>
      @endif
      {{-- List bookings here --}}
      <p>Your booking has been confirmed and saved to the database.</p>
    </div>
  </div>
</div>
@endsection
