<?php

namespace App\Models\TrainingProperties;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'run_types';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
