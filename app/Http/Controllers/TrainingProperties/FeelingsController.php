<?php

namespace App\Http\Controllers\TrainingProperties;

use App\Models\TrainingProperties\Feeling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeelingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feelings = Feeling::all();

        if (request()->expectsJson())
        {
            return $feelings;
        }

        return view('training_properties.run_feelings.index', compact('feelings'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingProperties\Feeling  $feeling
     * @return \Illuminate\Http\Response
     */
    public function show(Feeling $feeling)
    {
        //
    }
}
