<?php

namespace App\Http\Controllers\RaceProperties;

use App\Models\RaceProperties\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GendersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = Gender::all();

        if (request()->expectsJson())
        {
            return $genders;
        }

        return view('race_properties.genders.index', compact('genders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetProperties\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        //
    }
}
