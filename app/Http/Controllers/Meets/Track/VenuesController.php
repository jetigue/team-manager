<?php

namespace App\Http\Controllers\Meets\Track;

use App\Models\Meets\Track\Venue;
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

        if (request()->expectsJson())
        {
            return $venues;
        }

        return view('meets.track.venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Venue $venue)
    {
        return view('meets.track.venues.create', compact('venue'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Venue $venue)
    {
        $venue = request()->validate([
            'name'    => 'required|string|unique:track_venues,name',
            'city'    => 'required|string|alpha',
            'state'   => 'required|string|alpha'
        ]);

        Venue::create($venue);

        return redirect('/track/venues');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meets\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $venue->update(request(['name', 'city', 'state']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\Track\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Track venue deleted']);
        }

        return back();
    }
}
