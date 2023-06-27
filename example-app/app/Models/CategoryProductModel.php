<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProductModel extends Model
{
    use HasFactory;
    protected $table = 'category_product';
    protected $fillable = [
        'id_category',
        'id_product'
    ];
    CONST UPDATED_AT = NULL;
    CONST CREATED_AT = NULL;

    public function products(){
        return $this->belongsTo(ProductModel::class,'id_product','id_product');
    }

    public function productDetail(){
        return $this->belongsTo(ProductDetailModel::class,'id_product','id_product');
    }
}
