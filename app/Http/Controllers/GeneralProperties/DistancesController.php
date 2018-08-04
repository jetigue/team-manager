<?php

namespace App\Http\Controllers\GeneralProperties;

use App\Models\GeneralProperties\Distance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distances = Distance::all();

        if (request()->expectsJson())
        {
            return $distances;
        }

        return view('general_properties.distances.index', compact('distances'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralProperties\Distance  $distance
     * @return \Illuminate\Http\Response
     */
    public function show(Distance $distance)
    {
        //
    }

}
