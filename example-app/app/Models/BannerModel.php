<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    use HasFactory;
    protected $table = "banner";
    protected $primaryKey = "id_banner";
    protected $fillable = [
        'link_img',
        'alt',
        'name_img'
    ];
    CONST CREATED_AT = NULL;
    CONST UPDATED_AT = NULL;
}
