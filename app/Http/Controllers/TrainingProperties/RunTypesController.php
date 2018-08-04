<?php

namespace App\Http\Controllers\TrainingProperties;

use App\Models\TrainingProperties\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RunTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        if (request()->expectsJson())
        {
            return $types;
        }

        return view('training_properties.run_types.index', compact('types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingProperties\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }
}
