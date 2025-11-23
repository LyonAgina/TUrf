<?php
namespace App\Http\Controllers;
use App\Models\Turf;


class HomeController extends Controller
{
    public function index()
    {
        // Get distinct sports from turfs table
        $sports = Turf::select('sport')->distinct()->pluck('sport');
        return view('home', compact('sports'));
    }
}
