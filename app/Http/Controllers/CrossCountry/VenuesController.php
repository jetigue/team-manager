<?php

namespace App\Http\Controllers\CrossCountry;

use App\Http\Controllers\Controller;
use App\Models\CrossCountry\Venue;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();

        return view('cross_country.venues.index', compact('venues'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrossCountry\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }


}
