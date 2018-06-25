<?php

namespace App\Models\Meets;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meets\Track\Meet;

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
        return '/meets/hosts/' . $this->id;
    }

    public function trackMeet()
    {
        return $this->hasMany(Meet::class);
    }
}
