<?php

namespace App\Models\TrainingProperties;

use Illuminate\Database\Eloquent\Model;

class Feeling extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'run_feelings';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
