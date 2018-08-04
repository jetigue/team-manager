<?php

namespace App\Http\Controllers\API\GeneralProperties;

use App\Models\GeneralProperties\Terrain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TerrainsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrains = Terrain::all();

        return $terrains;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terrain = request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $terrain = Terrain::create($terrain);

        return response()->json($terrain, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralProperties\Terrain $terrain
     * @return \Illuminate\Http\Response
     */
    public function show(Terrain $terrain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\GeneralProperties\Terrain $terrain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terrain $terrain)
    {
        request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $terrain->update(request(['name', 'description']));

        return response()->json($terrain, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralProperties\Terrain $terrain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terrain $terrain)
    {
        $terrain->delete();

        return response()->json(null, 204);
    }
}
