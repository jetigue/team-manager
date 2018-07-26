<?php

namespace App\Http\Controllers\Meets\Track;

use App\Models\Meets\Track\Season;
use App\Models\Meets\Timing;
use App\Models\Meets\Track\Results\Team\Result;
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
        $meets = Meet::with('host', 'venue', 'timing', 'season', 'name')->get();

       if (request()->expectsJson())
        {
            return $meets;
        }

        return view('meets.track.meets.index', compact('meets'));
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
        $meet = $request->validate([
            'track_meet_name_id'    => 'required|integer',
            'meet_date'             => 'required|date',
            'host_id'               => 'required|integer',
            'track_season_id'       => 'required|integer',
            'timing_method_id'      => 'required|integer',
            'track_venue_id'        => 'required|integer' 
        ]);

        $meet = Meet::create($meet);

        if (request() -> expectsJson())
        {
            return $meet->load('name', 'host', 'timing', 'venue', 'season');
        }

        return redirect('/track/meets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Track\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
//        if (request()->expectsJson())
//        {
//            return $meet;
//        }

        return view('meets.track.meets.show', compact('meet'));
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
       request()->validate([
            'track_meet_name_id'    => 'required|integer',
            'meet_date'             => 'required|date',
            'host_id'               => 'required|integer',
            'track_season_id'       => 'required|integer',
            'timing_method_id'      => 'required|integer',
            'track_venue_id'        => 'required|integer'
        ]);

       $meet->update(request([
           'track_meet_name_id',
           'meet_date',
           'host_id',
           'track_season_id',
           'timing_method_id',
           'track_venue_id'
       ]));

        if (request()->expectsJson())
        {
            return $meet;
        }

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
