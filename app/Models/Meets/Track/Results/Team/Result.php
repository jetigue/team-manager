<?php

namespace App\Models\Meets\Track\Results\Team;
use App\Models\Meets\Division;
use App\Models\Meets\Gender;
use App\Models\Meets\Track\Meet;
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
        return $this->belongsTo(Meet::class, 'track_meet_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
