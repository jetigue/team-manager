<?php

namespace App\Models\GeneralProperties;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'seasons';

    /**
     * Fillable fields for a Track Venue
     *
     * @var array
     */
    protected $fillable = ['name'];
}
