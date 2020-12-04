<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BillSummary;
class Bill extends Model
{
    protected $fillable = ['patient_id','patient_name','date','invoiceno','grand_total','discount','vat','payable_amount'];

    public function billsummary()
    {
        return $this->hasMany(BillSummary::class);
    }
}
