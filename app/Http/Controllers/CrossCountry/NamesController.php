<?php

namespace App\Http\Controllers\CrossCountry;

use App\Http\Controllers\Controller;
use App\Models\CrossCountry\Name;
use Illuminate\Http\Request;

class NamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $names = Name::all();

        if (request()->expectsJson())
        {
            return $names;
        }

        return view('cross_country.names.index', compact('names'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CrossCountry\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Name $name)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CrossCountry\Name  $name
     * @return \Illuminate\Http\Response
     */
}
