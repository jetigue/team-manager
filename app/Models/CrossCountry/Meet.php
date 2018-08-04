<?php

namespace App\Models\CrossCountry;

use App\Models\MeetProperties\Host;
use App\Models\MeetProperties\Timing;
//use App\Models\CrossCountry\Results\Team\Result;
use App\Models\CrossCountry\Name;
use App\Models\CrossCountry\Venue;

use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_meets';

    /**
     * Fillable fields for a Track Meet.
     *
     * @var array
     */
    protected $fillable = [
        'cross_country_meet_name_id',
        'meet_date',
        'host_id',
        'timing_method_id',
        'cross_country_venue_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function name()
    {
        return $this->belongsTo(Name::class, 'cross_country_meet_name_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teamResults()
    {
        return $this->hasMany(Result::class, 'cross_country_meet_id');
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
        return $this->belongsTo(Venue::class, 'cross_country_venue_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timing()
    {
        return $this->belongsTo(Timing::class, 'timing_method_id');
    }
}
