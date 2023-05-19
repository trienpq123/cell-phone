<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagesModel extends Model
{
    use HasFactory;
    protected $table = 'pages';
    protected $primaryKey = 'id_page';
    protected $fillable = [
        'name_page',
        'slug',
        'meta_description',
        'meta_keyword',
        'meta_title',
        'status'
    ];
    CONST CREATED_AT = NULL;
    CONST UPDATED_AT = NULL;
}
