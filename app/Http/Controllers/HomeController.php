<?php
namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $turfs = \App\Models\Turf::with('location')->latest()->take(6)->get();
        return view('home', compact('turfs'));
    }
}
