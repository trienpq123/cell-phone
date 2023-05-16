<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImageModel extends Model
{
    use HasFactory;
    protected $table = "product_image";
    protected $primaryKey = "id_product_image";
    protected $fillable = [
        'id_product',
        'link_img',
        'name_img'
    ];
    CONST UPDATED_AT = NULL;
    CONST CREATED_AT = NULL;
    
    
}
