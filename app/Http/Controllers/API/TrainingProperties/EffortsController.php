<?php

namespace App\Http\Controllers\API\TrainingProperties;

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

        return $efforts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $effort = request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $effort = Effort::create($effort);

        return response()->json($effort, 201);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingProperties\Effort  $effort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Effort $effort)
    {
        request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $effort->update(request(['name', 'description']));

        return response()->json($effort, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingProperties\Effort  $effort
     * @return \Illuminate\Http\Response
     */
    public function destroy(Effort $effort)
    {
        $effort->delete();

        return response()->json(null, 204);
    }
}
