<?php

namespace App\Http\Controllers\GeneralProperties;

use App\Models\GeneralProperties\Season;
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

        return view('general_properties.seasons.index', compact('seasons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralProperties\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }
}
