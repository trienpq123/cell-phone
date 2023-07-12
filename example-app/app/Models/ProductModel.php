<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

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
    public function category(){
        return $this->belongsTo(CategoryModel::class,'id_category','id_category');
    }
    public function product_detail(){
        return $this->hasMany(ProductDetailModel::class,'id_product','id_product');
    }
    public function productOfCategory(){
        return $this->belongsTo(CategoryProductModel::class,'id_product','id_product');
    }
    public function GroupBySizeProduct(){
        return $this->belongsTo(ProductDetailModel::class,'id_product','id_product')->select("size",DB::raw("count(*)"))->groupBy('product_detail.size')->get();
    }
    public function GroupByColorProduct(){
        return $this->belongsTo(ProductDetailModel::class,'id_product','id_product')->select("color",DB::raw("count(*)"))->groupBy('product_detail.color')->get();
    }
    public function filterProduct(){
        return $this->belongsTo(FilterProduct::class,'id_product','id_product');
    }
}
