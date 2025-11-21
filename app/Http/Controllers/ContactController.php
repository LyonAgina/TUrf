<?php
namespace App\Http\Controllers;

use App\Models\Turf;

class ContactController extends Controller
{
    public function index()
    {
        $turfs = Turf::all();
        return view('contact', compact('turfs'));
    }
}
