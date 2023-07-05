<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterCategory extends Model
{
    use HasFactory;
    protected $table = "filter_category";
    protected $primaryKey = 'id_filter_category';
    protected $fillable = [
        'id_filter',
        'id_category'
    ];
    CONST CREATED_AT = NULL;
    CONST UPDATED_AT = NULL;
    public function category(){
        return $this->belongsTo(CategoryModel::class,'id_category','id_category');
    }
    public function childFilter(){
        return $this->hasMany(FilterModel::class,'_parent','id_filter');
    }

    public function filter(){
        return $this->hasMany(FilterModel::class,'filter_id','id_filter');
    }

}
