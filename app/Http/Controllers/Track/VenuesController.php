<?php

namespace App\Http\Controllers\Track;

use App\Models\Track\Venue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VenuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();

        if (request()->expectsJson())
        {
            return $venues;
        }

        return view('track.venues.index', compact('venues'));
    }
}
