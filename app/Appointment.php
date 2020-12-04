<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dentist;
use App\Patient;
use Carbon\Carbon;

class Appointment extends Model
{
   protected $append = ['today'];
    protected $fillable = ['dentist_id','patient_id','type','appointment_date','appointment_time','notes','dentist_notes','cancelled','finished'];

    public function dentist()
    {
        return belongs(Dentist::class);
    }
    public function patient()
    {
        return belongs(Patient::class);
    }
    
    public function gettodayAttribute()
    {
     $now = Carbon::today();
     $val = Carbon::parse($this->appointment_date);
     $rem = $now->diffInDays($val,false);
     return $rem;   
    }
}
