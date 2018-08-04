<?php

namespace App\Http\Controllers\API\GeneralProperties;

use App\Models\GeneralProperties\Distance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistancesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distances = Distance::all();

        return $distances;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $distance = request()->validate([
            'name'   => 'required|string|min:3',
            'meters' => 'required|integer'
        ]);

        $distance = Distance::create($distance);

        return response()->json($distance, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralProperties\Distance $distance
     * @return \Illuminate\Http\Response
     */
    public function show(Distance $distance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\GeneralProperties\Distance $distance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distance $distance)
    {
        request()->validate([
            'name'   => 'required|string|min:3',
            'meters' => 'required|integer'
        ]);

        $distance->update(request(['name', 'meters']));

        return response()->json($distance, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralProperties\Distance $distance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distance $distance)
    {
        $distance->delete();

        return response()->json(null, 204);
    }
}
