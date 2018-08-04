<?php

namespace App\Models\TrainingProperties;

use Illuminate\Database\Eloquent\Model;

class Effort extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'run_efforts';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
