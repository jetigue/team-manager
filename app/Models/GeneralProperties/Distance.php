<?php

namespace App\Models\GeneralProperties;

use Illuminate\Database\Eloquent\Model;

class Distance extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'distances';

    /**
     * Fillable fields for a Division
     *
     * @var array
     */
    protected $fillable = ['name', 'meters'];
}
