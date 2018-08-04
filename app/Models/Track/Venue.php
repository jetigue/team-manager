<?php

namespace App\Models\Track;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_venues';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'city',
        'state'
    ];

    /**
     * Get a string path for the venue.
     *
     * @return string
     */
    public function path()
    {
        return '/track/venues/' . $this->id;
    }
}
