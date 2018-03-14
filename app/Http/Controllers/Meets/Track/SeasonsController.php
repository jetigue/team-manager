<?php

namespace App\Http\Controllers\Meets\Track;

use App\Models\Meets\Track\Season;
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

        return view('meets.track.seasons.index', compact('seasons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $season = request()->validate([
            'name'    => 'required|string|unique:track_seasons,name'
        ]);

        Season::create($season);

        return redirect('/track/seasons');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meets\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\Season  $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        //
    }
}
