<?php

namespace App\Models\TrainingProperties;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'day_times';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
