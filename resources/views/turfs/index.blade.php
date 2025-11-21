@extends('layouts.app')
@section('title', 'Available Turfs')

@section('content')
<div class="min-h-screen bg-gray-50 py-6">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-md shadow-sm p-2 mb-4">
            {{-- Active Filter Tags --}}
            @php
              $activeFilters = [];
              if(request('location')) $activeFilters[] = ['label' => request('location'), 'param' => 'location'];
              if(request('sport')) $activeFilters[] = ['label' => ucfirst(request('sport')), 'param' => 'sport'];
              if(request('price')) {
                $priceMap = [
                  'low' => 'Under KES 2,000',
                  'mid' => 'KES 2,000 - 4,000',
                  'high' => 'Above KES 4,000'
                ];
                $activeFilters[] = ['label' => $priceMap[request('price')] ?? request('price'), 'param' => 'price'];
              }
            @endphp
            @if(count($activeFilters))
              <div class="flex flex-wrap gap-2 mb-2">
                @foreach($activeFilters as $filter)
                  <form method="GET" action="{{ route('turfs') }}" class="inline">
                    @foreach(request()->except($filter['param']) as $key => $val)
                      <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                    @endforeach
                    <span class="inline-flex items-center bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold mr-2">
                      {{ $filter['label'] }}
                      <button type="submit" class="ml-2 text-blue-500 hover:text-blue-700 focus:outline-none" title="Remove filter">
                        &times;
                      </button>
                    </span>
                  </form>
                @endforeach
              </div>
            @endif
      <style>
        @keyframes zigzag-cool {
          0%   { transform: translate(0, 0) scale(1) rotate(0deg); filter: drop-shadow(0 0 8px #22c55e); }
          15%  { transform: translate(-30px, -18px) scale(1.08) rotate(-6deg); filter: drop-shadow(0 0 12px #22c55e); }
          30%  { transform: translate(30px, -18px) scale(1.12) rotate(6deg); filter: drop-shadow(0 0 16px #3b82f6); }
          45%  { transform: translate(-30px, -18px) scale(1.08) rotate(-6deg); filter: drop-shadow(0 0 12px #22c55e); }
          60%  { transform: translate(30px, -18px) scale(1.12) rotate(6deg); filter: drop-shadow(0 0 16px #3b82f6); }
          75%  { transform: translate(-30px, -18px) scale(1.08) rotate(-6deg); filter: drop-shadow(0 0 12px #22c55e); }
          90%  { transform: translate(0, 0) scale(1) rotate(0deg); filter: drop-shadow(0 0 8px #22c55e); }
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
          100% { opacity: 0.7; transform: scale(1) translateY(0); }
        }
      </style>
      <h1 class="text-2xl sm:text-3xl font-bold text-center mb-1 tracking-wide text-gray-900 drop-shadow-lg relative" style="height: 70px;">
        <span class="zigzag-cool-animate px-4 py-1 rounded-xl transition-colors duration-300 cursor-pointer">
          Available Turfs
          <span class="sparkle" style="top:-8px;left:-18px;"></span>
          <span class="sparkle" style="top:-12px;right:-18px;"></span>
          <span class="sparkle" style="bottom:-8px;left:10px;"></span>
          <span class="sparkle" style="bottom:-12px;right:10px;"></span>
        </span>
        <span class="block mx-auto mt-2 w-16 h-1 rounded-full bg-gradient-to-r from-green-400 via-blue-500 to-purple-600"></span>
      </h1>

      <div class="flex items-center gap-1 mb-2">
        <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 4v16m8-8H4" />
        </svg>
        <span class="font-semibold text-gray-700 text-sm">Filters</span>
      </div>

      <form method="GET" action="{{ route('turfs') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">
        <div class="relative">
          <svg class="absolute left-2 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
          <input type="text" name="search" value="{{ request('search') }}"
            placeholder="Search turfs..."
            class="w-full pl-7 pr-2 py-1.5 text-sm bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 transition">
        </div>

        <select name="sport"
          class="px-2 py-1.5 text-sm bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 transition">
          <option value="">All Sports</option>
          <option value="football" {{ request('sport') === 'football' ? 'selected' : '' }}>Football</option>
          <option value="futsal" {{ request('sport') === 'futsal' ? 'selected' : '' }}>Futsal</option>
          <option value="basketball" {{ request('sport') === 'basketball' ? 'selected' : '' }}>Basketball</option>
        </select>

        <select name="location"
          class="px-2 py-1.5 text-sm bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 transition">
          <option value="">All Regions</option>
          @foreach(\App\Models\Location::select('city')->distinct()->orderBy('city')->get() as $loc)
            <option value="{{ $loc->city }}" {{ request('location') == $loc->city ? 'selected' : '' }}>
              {{ $loc->city }}
            </option>
          @endforeach
        </select>

        <select name="price"
          class="px-2 py-1.5 text-sm bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500 transition">
          <option value="">All Prices</option>
          <option value="low" {{ request('price') === 'low' ? 'selected' : '' }}>Under KES 2,000</option>
          <option value="mid" {{ request('price') === 'mid' ? 'selected' : '' }}>KES 2,000 - 4,000</option>
          <option value="high" {{ request('price') === 'high' ? 'selected' : '' }}>Above KES 4,000</option>
        </select>
        <div class="flex gap-2 mt-2">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Search</button>
          <a href="{{ route('turfs') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition">Clear Filters</a>
        </div>
      </form>

      <div class="mt-2 text-gray-600 text-xs">
        Showing <span class="font-bold">{{ $turfs->total() }}</span> turfs
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      @forelse($turfs as $turf)
        <div class="group relative bg-white rounded-2xl shadow-md hover:shadow-2xl transform hover:scale-[1.02] transition-all duration-300 overflow-hidden">
          <div class="relative h-64 overflow-hidden bg-gray-200">
            <img src="{{ $turf->image ? asset('storage/'.$turf->image) : asset('images/arena1.jpg') }}"
              alt="{{ $turf->name }}"
              class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

            @if(! ($turf->available ?? true))
              <div class="absolute inset-0 bg-black/60 flex items-center justify-center">
                <span class="bg-red-600 text-white px-6 py-3 rounded-full text-lg font-bold">
                  Fully Booked
                </span>
              </div>
            @endif
          </div>

          <div class="p-6 bg-gradient-to-b from-transparent via-green-50 to-white group-hover:via-green-100 transition-colors duration-500">
            <div class="flex justify-between items-start mb-3">
              <h3 class="text-xl font-bold text-gray-800">{{ $turf->name }}</h3>
              <div class="flex items-center gap-1">
                <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                  <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                </svg>
                <span class="font-semibold">4.8</span>
                <span class="text-sm text-gray-500">(128)</span>
              </div>
            </div>

            <div class="flex items-center gap-2 text-gray-600 mb-4">
              <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/>
              </svg>
              @if($turf->location)
                <span>
                  {{ $turf->location->city }}{{ $turf->location->neighborhood ? ', ' . $turf->location->neighborhood : '' }}
                </span>
              @else
                <span class="italic text-gray-400">Location not set</span>
              @endif
            </div>

            <div class="flex flex-wrap gap-2 mb-5">
              @if($turf->sport)
                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                  {{ ucfirst($turf->sport) }}
                </span>
              @else
                <span class="px-3 py-1 bg-gray-100 text-gray-500 rounded-full text-xs font-medium">
                  Sport not set
                </span>
              @endif
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-green-200">
              <div>
                <span class="text-3xl font-bold text-green-600">KES {{ number_format($turf->pricePerHour) }}</span>
                <span class="text-gray-500">/hr</span>
              </div>
              <div class="flex gap-2">
                <a href="/bookings/create?turf={{ $turf->id }}"
                  class="bg-green-600 hover:bg-teal-600 hover:scale-105 text-white font-bold py-3 px-6 rounded-xl transition-transform duration-300">
                  Book Now
                </a>
                @can('delete', $turf)
                  <form method="POST" action="{{ route('turfs.destroy', $turf->id) }}" onsubmit="return confirm('Are you sure you want to delete this turf?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-xl transition-transform duration-300">
                      Delete
                    </button>
                  </form>
                @endcan
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-span-full text-center py-20">
          <p class="text-3xl text-gray-500">No turfs match your filters.</p>
        </div>
      @endforelse
    </div>

    <div class="mt-12">
      {{ $turfs->appends(request()->query())->links() }}
    </div>
  </div>
</div>
@endsection
