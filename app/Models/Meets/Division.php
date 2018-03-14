<?php

namespace App\Models\Meets;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'divisions';

    /**
     * Fillable fields for a Division
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get a string path for the division.
     *
     * @return string
     */
    public function path()
    {
        return '/meets/divisions/' . $this->id;
    }
}
