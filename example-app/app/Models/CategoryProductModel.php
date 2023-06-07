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
}
