<?php

namespace App\Http\Controllers\RaceProperties;

use App\Models\RaceProperties\Distance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distances = Distance::all();

        if (request()->expectsJson())
        {
            return distances;
        }

        return view('race_properties.distances.index', compact('distances'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distance = request()->validate([
            'name'    => 'required|string|unique:distances,name',
            'meters'    => 'required|integer'
        ]);

        $distance = Distance::create($distance);

        if (request()->expectsJson())
        {
            return $distance;
        }

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetProperties\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distance $distance)
    {
        request()->validate([
            'name'    => 'required|string',
            'meters'    => 'required|integer'
        ]);

        $distance->update(request(['name', 'meters']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetProperties\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distance $distance)
    {
        $distance->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Distance deleted']);
        }

        return back();
    }
}
