<?php

namespace App\Models\CrossCountry;

use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_meet_names';


    /**
     * Fillable fields for a Track Meet Name.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
