<?php

namespace App\Models;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill_detail extends Model
{
    protected $table = "bill_details";
    public function product() : hasMany {
        return $this->hasMany(Product::class,'id_product');
    }
    public function bill () : BelongsTo{
        return $this->belongsTo(Bill::class,'id_bill');
    }
}
