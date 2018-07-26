<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{

//    protected $dates = ['dob'];

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'athletes';

  /**
    * Fillable fields for an athlete.
    *
    *@var array
    */
    protected $fillable = [
        'first_name',
        'last_name',
        'sex',
        'grad_year',
        'status',
        'dob',
        'user_id'
        ];

  /**
     * Get a string path for the division.
     *
     * @return string
     */
    public function path()
    {
        return '/athletes/' . $this->id;
    }

//  public function getStatusAttribute($value)
//    {
//        if ($value == "a") {
//            return "Active";
//        }
//
//        return "Inactive";
//    }
//
//  public function getSexAttribute($value)
//    {
//        if ($value == "f") {
//            return "Female";
//        }
//
//        return "Male";
//   	}

//    public function getAgeAttribute() {
//
//        return $this->dob->diffInYears(Carbon::now());
//    }

}
