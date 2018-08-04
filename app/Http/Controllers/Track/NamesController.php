<?php

namespace App\Http\Controllers\Track;

use App\Http\Controllers\Controller;
use App\Models\Track\Name;
use Illuminate\Http\Request;

class NamesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $names = Name::all();

        if (request()->expectsJson())
        {
            return $names;
        }

        return view('track.names.index', compact('names'));
    }
}
