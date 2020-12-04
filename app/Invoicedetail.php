<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoicedetail extends Model
{
    protected $fillable = [
        'invoice_no', 'grand_total',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}
