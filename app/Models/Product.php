<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type_product;
use App\Models\Bill_detail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = "products";

    protected $fillable = [
        'name',
        'id_type',
        'description',
        'unit_price',
        'promotion_price',
        'image',
        'unit',
        'new'];


    public function type_products () : BelongsTo{
        return $this->belongsTo(Type_product::class,'type_id');
    }
    public function bill_detail () : BelongsTo{
        return $this->belongsTo(Bill_detail::class,'id_product');
    }
}
