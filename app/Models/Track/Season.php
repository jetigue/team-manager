<?php

namespace App\Models\Track;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_seasons';


    /**
     * Fillable fields for a Track Season
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

		/**
     * Get a string path for the season.
     *
     * @return string
     */
    public function path()
    {
        return '/track/seasons/' . $this->id;
    }
}
