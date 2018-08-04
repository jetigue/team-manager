<?php

namespace App\Models\Track\Results\Team;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_team_results';

    /**
    * Fillable fields for a Track Team Result.
    *
    * @var array
    */
    protected $fillable = [
        'track_meet_id',
        'gender_id',
        'division_id',
        'place',
        'number_teams',
        'points'
    ];

    /**
     * Get a string path for the result.
     *
     * @return string
     */
    public function path()
    {
        return '/track/team/results/' . $this->id;
    }

    public function trackMeet()
    {
        return $this->belongsTo('\App\Models\Track\Meet', 'track_meet_id');
    }

    public function gender()
    {
        return $this->belongsTo('\App\Models\RaceProperties\Gender', 'gender_id');
    }

    public function division()
    {
        return $this->belongsTo('\App\Models\RaceProperties\Division', 'division_id');
    }
}
