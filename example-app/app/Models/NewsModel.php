<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'id_new';
    protected $fillable = [
        'title',
        'description',
        'meta_description',
        'meta_keyword',
        'meta_title',
        'id_user',
        'link_img',
        'name_img',
        'slug',
        'status'
    ];
}
