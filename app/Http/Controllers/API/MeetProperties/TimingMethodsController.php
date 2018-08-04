<?php

namespace App\Http\Controllers\API\MeetProperties;

use App\Models\MeetProperties\Timing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimingMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timings = Timing::all();

        return $timings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timing = request()->validate([
            'name'  => 'required|string|min:3',
        ]);

        $timing = Timing::create($timing);

        return response()->json($timing, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetProperties\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function show(Timing $timing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetProperties\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timing $timing)
    {
        request()->validate([
            'name'  => 'required|string|min:3',
        ]);

        $timing->update(request(['name']));

        return response()->json($timing, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetProperties\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timing $timing)
    {
        $timing->delete();

        return response()->json(null, 204);
    }
}
