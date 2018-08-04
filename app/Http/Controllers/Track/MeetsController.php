<?php

namespace App\Http\Controllers\Track;

use App\Models\Track\Meet;
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

        return view('track.meets.index', compact('meets'));
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

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        return view('track.meets.show', compact('meet'));
    }


}
