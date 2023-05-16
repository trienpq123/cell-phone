<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = "product";
    protected $primaryKey = "id_product";
    protected $fillable = [
        'name_product',
        'slug',
        'id_brand',
        'p_desc_short',
        'p_desc',
        'product_SKU',
        'status',
        'id_category'
    ];
    CONST CREATED_AT = NULL;
    CONST UPDATED_AT = NULL;

    public function brands(){
        return $this->belongsTo(BrandModel::class,'id_brand','id_brand');
    }

    public function images(){
        return $this->hasMany(ProductImageModel::class,'id_product','id_product');
    }
}
