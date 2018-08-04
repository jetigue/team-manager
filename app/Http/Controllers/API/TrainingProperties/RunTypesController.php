<?php

namespace App\Http\Controllers\API\TrainingProperties;

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

        return $types;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $type = Type::create($type);

        return response()->json($type, 201);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingProperties\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        request()->validate([
            'name'        => 'required|string|min:3',
            'description' => 'required|string'
        ]);

        $type->update(request(['name', 'description']));

        return response()->json($type, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingProperties\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return response()->json(null, 204);
    }
}
