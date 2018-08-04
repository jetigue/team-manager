<?php

namespace App\Http\Controllers\TrainingProperties;

use App\Models\TrainingProperties\Effort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EffortsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $efforts = Effort::all();

        if (request()->expectsJson())
        {
            return $efforts;
        }

        return view('training_properties.run_efforts.index', compact('efforts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingProperties\Effort  $effort
     * @return \Illuminate\Http\Response
     */
    public function show(Effort $effort)
    {
        //
    }
}
