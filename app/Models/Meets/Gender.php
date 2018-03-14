<?php

namespace App\Models\Meets;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genders';

    /**
     * Fillable fields for a Gender
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get a string path for the gender.
     *
     * @return string
     */
    public function path()
    {
        return '/meets/genders/' . $this->id;
    }
}
