<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bill;
class BillSummary extends Model
{
    protected $fillable =['particular','quantity','rate','total_amount'];


public function bill()
{
    return $this->belongsTo(Bill::class);
}



}
