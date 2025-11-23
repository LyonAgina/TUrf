<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Turf;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        // Only allow admins (role is a string column)
        if (!auth()->check() || auth()->user()->role !== 'Admin') {
            abort(403, 'Unauthorized');
        }

        $userCount = User::count();
        $turfCount = Turf::count();
        $bookingCount = Booking::count();

        return view('admin.index', compact('userCount', 'turfCount', 'bookingCount'));
    }
}
