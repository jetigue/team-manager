<?php

namespace App\Http\Controllers\API\Track;

use App\Models\Track\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $season = Season::all();

        return $season;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $season = request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $season = Season::create($season);

        return response()->json($season, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track\Season $season
     * @return \Illuminate\Http\Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track\Season $season
     * @return \Illuminate\Http\Response
     */
    public function edit(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Track\Season $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Season $season)
    {
        request()->validate([
            'name' => 'required|string|min:3'
        ]);

        $season->update(request(['name']));

        return response()->json($season, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track\Season $season
     * @return \Illuminate\Http\Response
     */
    public function destroy(Season $season)
    {
        $season->delete();

        return response()->json(null, 204);
    }
}
