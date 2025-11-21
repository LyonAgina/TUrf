@extends('layouts.app')
@section('title', 'Book Turf')
@section('content')
<div class="min-h-screen bg-gray-50 py-6">
  <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-md shadow-sm p-6">
      <h2 class="text-2xl font-bold mb-4 text-center">Book Turf</h2>
      <form method="POST" action="{{ route('bookings.store') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="turf_id" value="{{ request('turf') }}">
        <div>
          <label class="block text-sm font-medium text-gray-700">Your Name</label>
          <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Phone Number</label>
          <input type="text" name="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">Payment Information</label>
          <input type="text" name="payment_info" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-teal-500 focus:border-teal-500" placeholder="e.g. M-Pesa code" required>
        </div>
        <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg font-semibold hover:bg-green-700 transition">Confirm Booking</button>
      </form>
    </div>
  </div>
</div>
@endsection
