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
        'id_size',
        'id_color',
        'price_sale',
        'price',
        'quanlity',
        'link_img',
        'name_img'
    ];
}
