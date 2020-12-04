<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'address', 'cellphone', 'gender', 'birthdate',
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}