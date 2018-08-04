<?php

namespace App\Http\Controllers\API\TrainingProperties;

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

        return $feelings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $feeling = request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $feeling = Feeling::create($feeling);

        return response()->json($feeling, 201);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingProperties\Feeling  $feeling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feeling $feeling)
    {
        request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $feeling->update(request(['name', 'description']));

        return response()->json($feeling, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingProperties\Feeling  $feeling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feeling $feeling)
    {
        $feeling->delete();

        return response()->json(null, 204);
    }
}
