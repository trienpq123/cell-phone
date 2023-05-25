<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model
{
    use HasFactory;
    protected $table = 'attribute';
    protected $primaryKey = 'id_attr';
    protected $fillable = [
        'id_category',
        'name_attr'
    ];
    CONST UPDATED_AT = NULL;
    CONST CREATED_AT = NULL;

    public function category(){
        return $this->belongsTo(CategoryModel::class,'id_category','id_category');
    }
}
