<?php

namespace App\Http\Controllers\Meets;

use App\Models\Meets\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

        if (request()->expectsJson())
        {
            return $divisions;
        }

        return view('meets.divisions.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Division $division)
    {
        $division = request()->validate([
            'name' => 'required|string|unique:divisions,name'
        ]);

        $division = Division::create($division);

        if (request()->expectsJson())
        {
            return $division;
        }

        return back()->with('flash', 'Division has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Division $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\Division $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Meets\Division $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
//        try {
            request()->validate([
                'name' => 'required|string|unique:divisions,name'
            ]);

            $division->update(request(['name']));

//            $division = Division::update([$division]);

            if (request()->expectsJson())
            {
                return $division;
            }

//        } catch (\Exception $e)
//        {
//            return response(
//                'Sorry, the division could not be saved at this time.', 422
//            );
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\Division $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();

        if (request()->expectsJson())
        {
            return response(['status' => 'Division deleted']);
        }

        return back();
    }
}
