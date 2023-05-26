<?php

namespace App\Models;

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
    public function chirendMenu(){
        return $this->hasMany(MenuModel::class,'parent_menu','id_menu')->with('menu');
    }
}
