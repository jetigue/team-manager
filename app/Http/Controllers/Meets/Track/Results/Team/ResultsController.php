<?php

namespace App\Http\Controllers\Meets\Track\Results\Team;

use App\Models\Meets\Track\Meet;
use App\Models\Meets\Track\Results\Team\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class ResultsController
 * @package App\Http\Controllers\Meets\Track\Results\Team
 */
class ResultsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::with('gender', 'division')->get();

        if (request()->expectsJson())
        {
            return $results;
        }

        return view('meets.track.results.team.index', compact('results'));
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
     * @param \App\Models\Meets\Track\Meet $meet
     * @return \Illuminate\Http\Response
     */
    public function store(Meet $meet)
    {

        $result = $meet->addResult([
            'gender_id',
            'division_id',
            'place',
            'number_teams',
            'points'
        ]);

        if (request()->expectsJson())
        {
            return $result->load('gender', 'division');
        }

        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meets\Track\Results\Team\Result $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return view('meets.track.results.team.show', compact('results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Meets\Track\Results\Team\Result $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Meets\Track\Meet $meet
     * @param  \App\Models\Meets\Track\Results\Team\Result $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meet $meet, Result $result)
    {

        request()->validate([
            'gender_id'    => 'required|integer',
            'division_id'  => 'required|integer',
            'place'        => 'nullable|integer',
            'number_teams' => 'required|integer',
            'points'       => 'nullable|numeric',
        ]);

        $result->update(request([
            'gender_id',
            'division_id',
            'place',
            'number_teams',
            'points'
        ]));

        if (request()->expectsJson())
        {
            return $result;
        }

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meets\Track\Results\Team\Result $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();

        if (request()->expectsJson())
        {
            return response(['status' => 'Team Result deleted']);
        }
    }
}
