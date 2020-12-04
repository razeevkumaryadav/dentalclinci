<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'address', 'cellphone', 'gender', 'birthdate',
    ];
    // protected $primaryKey = 'id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoice()
    {
        return $this->hasMany('App\Invoice', 'patient_id');
    }

    public function invoicedetail()
    {
        return $this->hasMany('App\Invoicedetail', 'patient_id');
    }
}
