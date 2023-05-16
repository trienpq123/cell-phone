<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = "brand";
    protected $primaryKey = "id_brand";
    protected $fillable = [
        'name_brand',
        'logo_brand',
        'name_logo',
        'slug',
        'status'
    ];
    CONST CREATED_AT = null;
    CONST UPDATED_AT = null;
}
