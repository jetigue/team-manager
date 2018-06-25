<?php

namespace App\Models\Meets\Track;

use App\Models\Meets\Host;
use App\Models\Meets\Track\Season;
use App\Models\Meets\Timing;
use App\Models\Meets\Track\Results\Team\Result;
use App\Models\Meets\Track\Name;
use App\Models\Meets\Track\Venue;
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
        return '/track/meets/' . $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meetName()
    {
        return $this->belongsTo(Name::class, 'track_meet_name_id');
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
        return $this->belongsTo(Host::class, 'host_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo(Venue::class, 'track_venue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function season()
    {
        return $this->belongsTo(Season::class, 'track_season_id');
    }

    /**
     *
     */
    public function addResult()
    {
        $meet = request()->validate([
            'gender_id'    => 'required|integer',
            'division_id'  => 'required|integer',
            'place'        => 'nullable|integer|max:number_teams',
            'number_teams' => 'required|integer',
            'points'       => 'nullable|numeric',
        ]);

        $this->teamResults()->create($meet);
    }

}
