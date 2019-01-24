<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';
    protected $fillable = [
        'id',
        'admin_id',
        'title_ar',
        'title_en',
        'desc_ar',
        'desc_en',
        'image',
        'created_at',
        'updated_at',
    ];
}
