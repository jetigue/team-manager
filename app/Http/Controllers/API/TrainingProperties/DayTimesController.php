<?php

namespace App\Http\Controllers\API\TrainingProperties;

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

        return $times;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $time = request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $time = Time::create($time);

        return response()->json($time, 201);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingProperties\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time)
    {
        request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $time->update(request(['name', 'description']));

        return response()->json($time, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingProperties\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        $time->delete();

        return response()->json(null, 204);
    }
}
