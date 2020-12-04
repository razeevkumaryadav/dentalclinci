<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dentist extends Model
{
    protected $fillable  = [
        'first_name','last_name','address','bio','avatar','specialities','phone','cellphone','gender','birthdate'
    ];

    public function appointment()
    {
        return $this->hasMany('App\Appointment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function timetable()
    {
        return $this->hasMany(TimeTable::class,'dentist_id');
    }
}
