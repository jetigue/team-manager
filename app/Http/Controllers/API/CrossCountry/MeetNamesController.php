<?php

namespace App\Http\Controllers\API\CrossCountry;

use App\Models\CrossCountry\Name;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetNamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $names = Name::all();

        return $names;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\CrossCountry\Name $name
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Name $name)
    {
        $name = request()->validate([
            'name' => 'required|string|unique:cross_country_meet_names,name|min:3',
        ]);

        $name = Name::create($name);

        return response()->json($name, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CrossCountry\Name $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Name $name)
    {
        request()->validate([
            'name' => 'required|string|unique:cross_country_meet_names,name|min:3',
        ]);

        $name->update(request(['name']));

        return response()->json($name, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CrossCountry\Name $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(Name $name)
    {
        $name->delete();

        return response()->json(null, 204);
    }
}
