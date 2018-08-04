<?php

namespace App\Models\CrossCountry;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cross_country_venues';


    /**
     * Fillable fields for a Track Meet Name.
     *
     * @var array
     */
    protected $fillable = ['name', 'city', 'state'];
}
