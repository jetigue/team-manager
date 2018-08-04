<?php

namespace App\Http\Controllers\Track;

use App\Models\Track\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();

        if (request()->expectsJson())
        {
            return $seasons;
        }

        return view('track.seasons.index', compact('seasons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }
}
