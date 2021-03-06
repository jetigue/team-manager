<?php

namespace App\Models\Track;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_meet_names';


    /**
    * Fillable fields for a Track Meet Name.
    *
    * @var array
    */
    protected $fillable = ['name'];

    /**
     * Get a string path for the name.
     *
     * @return string
     */
    public function path()
    {
        return '/track/meet/names/' . $this->id;
    }
}
