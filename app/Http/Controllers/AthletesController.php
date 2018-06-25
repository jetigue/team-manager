<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;

class AthletesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $athletes = Athlete::all();

        return view('athletes.index', compact('athletes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $athlete = request()->validate([
            'first_name' => 'required|string',
            'last_name'  => 'required|string',
            'sex'        => 'required',
            'dob'        => 'nullable|date',
            'grad_year'  => 'required|integer',
            'user_id'    => 'nullable|integer',
            'status'     => 'required'
        ]);

        Athlete::create($athlete);

        return back()->with('flash', 'Athlete added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function show(Athlete $athlete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function edit(Athlete $athlete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Athlete $athlete)
    {
        $athlete->update(request([
            'first_name',
            'last_name',
            'sex',
            'dob',
            'grad_year',
            'status',
            'user_id'
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Athlete $athlete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Athlete $athlete)
    {
        $athlete->delete();

        if (request()->expectsJson())
        {
            return response(['status' => 'Athlete deleted']);
        }

        return back();
    }
}
