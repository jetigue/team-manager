<?php

namespace App\Http\Controllers\Meets;

use App\Models\Meets\Timing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timings = Timing::all();

        if (request()->expectsJson())
        {
            return $timings;
        }

        return view('meets.timing.index', compact('timings'));
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
        $timing = request()->validate([
            'name'    => 'required|string|unique:timing_methods,name'
        ]);

        $timing = Timing::create($timing);

        if (request()->expectsJson())
        {
            return $timing;
        }

        return redirect('/meets/timing');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function show(Timing $timing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function edit(Timing $timing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meets\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Timing $timing)
    {
        request()->validate([
            'name'    => 'required|string|unique:timing_methods,name'
        ]);

        $timing->update(request(['name']));

//        if (request()->expectsJson())
//        {
//            return $timing;
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\Timing  $timing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timing $timing)
    {
        $timing->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Timing deleted']);
        }

        return back();
    }
}
