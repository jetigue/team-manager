<?php

namespace App\Http\Controllers\API\RaceProperties;

use App\Models\RaceProperties\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

        return $divisions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $division = request()->validate([
            'name'        => 'required|string|min:3'
        ]);

        $division = Division::create($division);

        return response()->json($division, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RaceProperties\Division $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RaceProperties\Division $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        request()->validate([
            'name'        => 'required|string|min:3'
        ]);

        $division->update(request(['name', 'description']));

        return response()->json($division, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RaceProperties\Division $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();

        return response()->json(null, 204);
    }
}
