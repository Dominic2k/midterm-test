<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type_product extends Model
{
    protected $table = "type_products";
    public function products() : hasMany {
        return $this->hasMany(Product::class,'type_id');
    }
}
