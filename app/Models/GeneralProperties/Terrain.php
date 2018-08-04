<?php

namespace App\Models\GeneralProperties;

use Illuminate\Database\Eloquent\Model;

class Terrain extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'terrain_types';

    /**
     * Fillable fields for a Terrain Type
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
}
