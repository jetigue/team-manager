<?php

namespace App\Models\Track;

use App\Models\Track\Results\Team\Result;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'track_meets';

    /**
     * Fillable fields for a Track Meet.
     *
     * @var array
     */
    protected $fillable = [
        'track_meet_name_id',
        'meet_date',
        'host_id',
        'track_season_id',
        'timing_method_id',
        'track_venue_id'
    ];

    /**
     * Get a string path for the meet.
     *
     * @return string
     */
    public function path()
    {
        return '/track/meet_properties/' . $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function name()
    {
        return $this->belongsTo('App\Models\Track\Name', 'track_meet_name_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamResults()
    {
        return $this->hasMany(Result::class, 'track_meet_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function host()
    {
        return $this->belongsTo('App\Models\MeetProperties\Host', 'host_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo('App\Models\Track\Venue', 'track_venue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timing()
    {
        return $this->belongsTo('App\Models\MeetProperties\Timing', 'timing_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo('App\Models\Track\Season', 'track_season_id');
    }

    /**
     * @param $result
     * @param array $result
     */
    public function addResult($result)
    {
        $result = request()->validate([
            'gender_id'    => 'required|integer',
            'division_id'  => 'required|integer',
            'place'        => 'nullable|integer|max:number_teams',
            'number_teams' => 'required|integer',
            'points'       => 'nullable|numeric',
        ]);

        return $this->teamResults()->create($result);
    }

}
