<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterProduct extends Model
{
    use HasFactory;
    protected $table = 'filter_product';
    protected $primaryKey = 'id_filter_option_product';
    protected $fillable = [
     'id_product',
     'id_filter'
    ];
    CONST UPDATED_AT = NULL;
    CONST CREATED_AT = NULL;
}
