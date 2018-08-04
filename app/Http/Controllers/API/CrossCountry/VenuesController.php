<?php

namespace App\Http\Controllers\API\CrossCountry;

use App\Models\CrossCountry\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenuesController extends Controller {

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
     * @param  \App\Models\CrossCountry\Venue $venue
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Venue $venue)
    {
        $venue = request()->validate([
            'name'  => 'required|string|min:3',
            'city'  => 'required|string',
            'state' => 'required|string'
        ]);

        $venue = Venue::create($venue);

        return response()->json($venue, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        request()->validate([
            'name'  => 'required|string|unique:cross_country_venues,name|min:3',
            'city'  => 'required|string',
            'state' => 'required|string'
        ]);

        $venue->update(request(['name', 'city', 'state']));

        return response()->json($venue, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrossCountry\Venue $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return response()->json(null, 204);
    }
}
