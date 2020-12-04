<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dentist;

class TimeTable extends Model
{
    
    protected $fillable = ['day','start','end','dentist_id'];

    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }
}
