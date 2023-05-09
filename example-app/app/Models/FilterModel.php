<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterModel extends Model
{
    use HasFactory;
    protected $table = 'filter';
    protected $primaryKey = 'filter_id';
    protected $fillable = [
        'filter_name',
        'slug',
        '_parent'
    ];
    CONST CREATED_AT = null;
    CONST UPDATED_AT = null;

    public function filter(){
        return $this->hasMany(FilterModel::class,'_parent','filter_id');
    }
    public function childrentFilter(){
        return $this->hasMany(FilterModel::class,'_parent','filter_id')->with('filter');
    }
    
    public function getFilter(){
        return $this->belongsTo(FilterModel::class,'filter_id','filter_id');
    }
}
