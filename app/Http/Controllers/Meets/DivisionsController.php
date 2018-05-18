<?php

namespace App\Http\Controllers\Meets;

use App\Models\Meets\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $division = request()->validate([
            'name'    => 'required|string|unique:divisions,name'
        ]);

        Division::create($division);

        return redirect('/meets/divisions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meets\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        $division->update(request(['name']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy(Division $division)
    {
        $division->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Division deleted']);
        }

        return back();
    }
}
