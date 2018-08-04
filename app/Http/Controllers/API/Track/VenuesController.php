<?php

namespace App\Http\Controllers\API\Track;

use App\Models\Track\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();

        return $venues;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venue = request()->validate([
            'name'  => 'required|string|unique:track_venues,name|min:3',
            'city'  => 'required|string',
            'state' => 'required|string'
        ]);

        $venue = Venue::create($venue);

        return response()->json($venue, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        request()->validate([
            'name'  => 'required|string|unique:track_venues,name|min:3',
            'city'  => 'required|string',
            'state' => 'required|string'
        ]);

        $venue->update(request(['name', 'city', 'state']));

        return response()->json($venue, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return response()->json(null, 204);
    }
}
