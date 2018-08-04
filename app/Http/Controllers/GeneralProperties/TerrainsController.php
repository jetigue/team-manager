<?php

namespace App\Http\Controllers\GeneralProperties;

use App\Models\GeneralProperties\Terrain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TerrainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrains = Terrain::all();

        if (request()->expectsJson())
        {
            return $terrains;
        }

        return view('general_properties.terrain_types.index', compact('terrains'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralProperties\Terrain  $terrain
     * @return \Illuminate\Http\Response
     */
    public function show(Terrain $terrain)
    {
        //
    }
}
