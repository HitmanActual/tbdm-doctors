<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Doctor extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'start_date','img_id','speciality_id','commercial_name','home_visit',
        'degree','short_description','description','total_rates',
    ];


}