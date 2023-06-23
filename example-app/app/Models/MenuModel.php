<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;
    protected $table = "menu";
    protected $primaryKey = "id_menu";
    protected $fillable = [
        'name_menu',
        'parent_menu',
        'link_url',
        'position',
        'status',
        'type',
        'slug'
    ];
    CONST UPDATED_AT = NULL;
    CONST CREATED_AT  = NULL;

    public function menu(){
        return $this->hasMany(MenuModel::class,'parent_menu','id_menu');
    }

    public function filter(){
        return $this->belongsTo(FilterModel::class,'link_url','slug');
    }
    public function chirendMenu(){
        return $this->hasMany(MenuModel::class,'parent_menu','id_menu')->with('menu','filter','filter.childrentFilter');
    }

    public function category(){
        return $this->belongsTo(CategoryModel::class,'link_url','slug');
    }


    // public function getCategory(){
    //     return $this->belongsTo(CategoryController::class,'link_url','slug');
    // }
}
