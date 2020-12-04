<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subservice extends Model
{
    protected $fillable =[
        'subname', 'rate'
    ];
    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
