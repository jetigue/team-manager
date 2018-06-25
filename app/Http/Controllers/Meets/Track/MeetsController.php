<?php

namespace App\Http\Controllers\Meets\Track;

use App\Models\Meets\Track\Season;
use App\Models\Meets\Timing;
use App\Models\Meets\Track\Meet;
use App\Models\Meets\Track\Name;
use App\Models\Meets\Track\Venue;
Use App\Models\Meets\Host;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MeetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosts = Host::all();
        $names = Name::all();
        $meets = Meet::with('host', 'venue', 'timing', 'season', 'meetName')->get();
        $seasons = Season::all();
        $timingMethods = Timing::all();
        $venues = Venue::all();
//
        return view('meets.track.meets.index', compact(
            'hosts',
            'names',
            'meets',
            'seasons',
            'timingMethods',
            'venues'
            ));


//        return response()->json($meets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Meet $meet)
    {
        $meet = request()->validate([
            'track_meet_name_id'    => 'required|integer',
            'meet_date'             => 'required|date',
            'host_id'               => 'required|integer',
            'track_season_id'       => 'required|integer',
            'timing_method_id'      => 'required|integer',
            'track_venue_id'        => 'required|integer' 
        ]);

        Meet::create($meet);



        return back()->with('flash', 'Meet added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Track\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        $genders = \App\Models\Meets\Gender::all();
        $divisions = \App\Models\Meets\Division::all();

        return view('meets.track.meets.show', compact('meet', 'genders', 'divisions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\Track\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function edit(Meet $meet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meets\Track\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meet $meet)
    {
        $meet->update(request([
            'track_meet_name_id',
            'meet_date',
            'host_id',
            'track_venue_id',
            'timing_method_id',
            'track_season_id'
            ]));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\Track\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meet $meet)
    {
        $meet->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Track meet deleted']);
        }

        return back();
    }
}
