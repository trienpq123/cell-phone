<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;
    protected $table = "menu";
    protected $primayKey = "id_menu";
    protected $fillable = [
        'name_menu',
        'parent_menu',
        'link_url',
        'position',
        'status'
    ];
    CONST UPDATED_AT = NULL;
    CONST CREATED_AT  = NULL;
}
