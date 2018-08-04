<?php

namespace App\Http\Controllers\RaceProperties;

use App\Models\RaceProperties\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

        if (request()->expectsJson())
        {
            return $divisions;
        }

        return view('race_properties.divisions.index', compact('divisions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetProperties\Division $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }
}
