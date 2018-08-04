<?php

namespace App\Http\Controllers\CrossCountry;

use App\Http\Controllers\Controller;
use App\Models\CrossCountry\Meet;
use Illuminate\Http\Request;

class MeetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meets = Meet::with('host', 'venue', 'timing', 'name')->get();

        if (request()->expectsJson())
        {
            return $meets;
        }

        return view('cross_country.meets.index', compact('meets'));
    }

    /**
     * @param Request $request
     * @param Meet $meet
     * @return Meet|\Illuminate\Database\Eloquent\Model
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

        if (request()->expectsJson())
        {
            return $meet->load('name', 'host', 'timing', 'venue');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrossCountry\Meet  $meet
     * @return \Illuminate\Http\Response
     */
    public function show(Meet $meet)
    {
        return view('cross_country.meets.show', compact('meet'));
    }

}
