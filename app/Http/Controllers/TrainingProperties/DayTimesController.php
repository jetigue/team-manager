<?php

namespace App\Http\Controllers\TrainingProperties;

use App\Models\TrainingProperties\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DayTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Time::all();

        if (request()->expectsJson())
        {
            return $times;
        }

        return view('training_properties.day_times.index', compact('times'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingProperties\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }
}
