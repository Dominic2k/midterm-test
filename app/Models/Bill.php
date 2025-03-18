<?php

namespace App\Models;
use App\Models\Bill_detail;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bill extends Model
{
    protected $table = "bills";
    public function bill_detail() : hasOne {
        return $this->hasOne(Bill_detail::class,'id_bill');
    }
    public function customer () : BelongsTo{
        return $this->belongsTo(Customer::class,'id_customer');
    }
}
