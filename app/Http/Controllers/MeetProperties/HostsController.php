<?php

namespace App\Http\Controllers\MeetProperties;

use App\Models\MeetProperties\Host;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hosts = Host::all();

        if (request()->expectsJson())
        {
            return $hosts;
        }

        return view('meet_properties.hosts.index', compact('hosts'));


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
        $host = request()->validate([
            'name'    => 'required|string|unique:hosts,name'
        ]);

        $host = Host::create($host);

        if (request()->expectsJson())
        {
            return $host;
        }

        return redirect('/meet_properties/hosts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MeetProperties\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MeetProperties\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function edit(Host $host)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MeetProperties\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Host $host)
    {
        request()->validate([
            'name'    => 'required|string|unique:hosts,name'
        ]);

        $host->update(request(['name']));

        if (request()->expectsJson())
        {
            return $host;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MeetProperties\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $host)
    {
        $host->delete();

        if (request()->expectsJson()) {
            return response(['status' => 'Host deleted']);
        }

        return back();
    }
}
