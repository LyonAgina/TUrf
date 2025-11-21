<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurfRequest;
use App\Http\Requests\UpdateTurfRequest;
use App\Models\Turf;
use App\Models\Location;

class TurfController extends Controller
{
    /**
     * Display a listing of the resource with full filtering & sorting
     */
    public function index()
    {
        $query = Turf::with('location');

        // 1. SEARCH by name
        if ($search = request('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        // 2. FILTER by SPORT (single sport string)
        if ($sport = request('sport')) {
            $query->where('sport', $sport);
        }

        // 3. FILTER by LOCATION (city)
        if ($location = request('location')) {
            $query->whereHas('location', function ($q) use ($location) {
                $q->where('city', $location);
            });
        }

        // 4. FILTER by PRICE RANGE
        if ($price = request('price')) {
            match ($price) {
                'low'  => $query->where('pricePerHour', '<', 2000),
                'mid'  => $query->whereBetween('pricePerHour', [2000, 4000]),
                'high' => $query->where('pricePerHour', '>', 4000),
                default => null
            };
        }

        // 5. SORTING
        $sort = request('sort', 'latest');
        match ($sort) {
            'name'        => $query->orderBy('name'),
            'price_asc'   => $query->orderBy('pricePerHour'),
            'price_desc'  => $query->orderByDesc('pricePerHour'),
            'rating'      => $query->orderByDesc('rating'), // if you have rating column
            default       => $query->latest(), // created_at desc
        };

        // 6. PAGINATION - 9 per page (perfect for 3×3 grid)
        $turfs = $query->paginate(9)->withQueryString();

        // Pass only unique cities for dropdown
        $locations = Location::select('city')->distinct()->orderBy('city')->get();

        return view('turfs.index', compact('turfs', 'locations'));
    }

    // ... rest of your methods (create, store, etc.)
}