<?php

namespace App\Models\Meets;

use Illuminate\Database\Eloquent\Model;

class Timing extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'timing_methods';

    /**
     * Fillable fields for a Timing Methods
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get a string path for timing method.
     *
     * @return string
     */
    public function path()
    {
        return '/meets/timing/' . $this->id;
    }
}
