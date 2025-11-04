<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTurfRequest;
use App\Http\Requests\UpdateTurfRequest;
use App\Models\Turf;

class TurfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $turfs = \App\Models\Turf::with('location')->latest()->paginate(9);
        return view('turfs', compact('turfs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTurfRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Turf $turf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Turf $turf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTurfRequest $request, Turf $turf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Turf $turf)
    {
        //
    }
}
