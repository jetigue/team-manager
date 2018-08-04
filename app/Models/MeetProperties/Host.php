<?php

namespace App\Models\MeetProperties;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hosts';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get a string path for the host.
     *
     * @return string
     */
    public function path()
    {
        return '/meet_properties/hosts/' . $this->id;
    }


    public function crossCountryMeet()
    {
        return $this->hasMany('\App\Models\CrossCountry\Meet');
    }

    public function trackMeet()
    {
        return $this->hasMany('\App\Models\Track\Meet');
    }
}
