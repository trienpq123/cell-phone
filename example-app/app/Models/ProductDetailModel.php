<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetailModel extends Model
{
    use HasFactory;
    protected $table = 'product_detail';
    protected $primaryKey = "'id_product_detail";
    protected $fillable = [
        'id_product',
        'size',
        'color',
        'price_sale',
        'price',
        'quanlity',
        'link_img',
        'name_img',
        'product_sku'
    ];
    CONST UPDATED_AT = NULL;
    CONST CREATED_AT = NULL;
}
