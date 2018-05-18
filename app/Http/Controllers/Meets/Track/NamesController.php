<?php

namespace App\Http\Controllers\Meets\Track;
use App\Http\Controllers\Controller;
use App\Models\Meets\Track\Name;
use Illuminate\Http\Request;

class NamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $names = Name::all();

        return view('meets.track.names.index', compact('names'));
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
    public function store(Request $request, Name $name)
    {
        $name = request()->validate([
            'meet_name'    => 'required|string|unique:track_meet_names,meet_name|min:3',
        ]);

        Name::create($name);

        return redirect('/track/meet/names');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Track\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function show(Name $name)
    {
        return view('meets.track.names.show', compact('name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Track\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function edit(Name $name)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Track\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Name $name)
    {
        $name->update(request(['meet_name']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Track\Meets\Name  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(Name $name)
    {
        $name->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Meet name deleted']);
        }

        return back();
    }
}
