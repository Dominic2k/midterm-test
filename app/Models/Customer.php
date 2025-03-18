<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $table = "customers";
    public function bill() : hasMany {
        return $this->hasMany(Bill::class,'id_customer');
    }
}
