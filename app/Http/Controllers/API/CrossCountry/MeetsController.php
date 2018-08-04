<?php

namespace App\Http\Controllers\API\CrossCountry;

use App\Models\CrossCountry\Meet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meets = Meet::all();

        return $meets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Meet $meet)
    {
        $meet = $request->validate([
            'cross_country_meet_name_id' => 'required|integer',
            'meet_date'                  => 'required|date',
            'host_id'                    => 'required|integer',
            'timing_method_id'           => 'required|integer',
            'cross_country_venue_id'     => 'required|integer'
        ]);

        $meet = Meet::create($meet);

        return $meet->load('name', 'timing', 'venue', 'host');

//        return response()->json($meet, 201);

//        if (request()->expectsJson())
//        {
//            return $meet->load('name', 'host', 'timing', 'venue', 'season');
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrossCountry\Meet $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\CrossCountry\Meet $meet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meet $meet)
    {
        request()->validate([
        'cross_country_meet_name_id' => 'required|integer',
        'meet_date'                  => 'required|date',
        'host_id'                    => 'required|integer',
        'timing_method_id'           => 'required|integer',
        'cross_country_venue_id'     => 'required|integer'
        ]);

        $meet->update(request([
            'cross_country_meet_name_id',
            'meet_date',
            'host_id',
            'timing_method_id',
            'cross_country_venue_id'
        ]));

        return response()->json($meet, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrossCountry\Meet $meet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meet $meet)
    {
        $meet->delete();

        return response()->json(null, 204);
    }
}
