<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no', 'particular_id', 'particular', 'rate', 'quantity', 'total_amount',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

}
