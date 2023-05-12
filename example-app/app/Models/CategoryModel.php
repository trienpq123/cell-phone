<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $primaryKey = "id_category";
    protected $fillable = [
        'name_category',
        'slug',
        'desc_category',
        'image_category',
        'name_image',
        'parent_category',
        'hide'
    ];
    CONST CREATED_AT = null;
    CONST UPDATED_AT = null;

    public function getFilter(){
        return $this->belongsTo(FilterCategory::class,'id_category','id_category');
    }
}
