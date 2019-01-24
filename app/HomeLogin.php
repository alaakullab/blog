<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeLogin extends Model
{
    protected $table    = 'home_logins';
    protected $fillable = [

        'id',
        'title_en',
        'title_ar',
        'name_title1_en',
        'name_title1_ar',
        'name_desc1_en',
        'name_desc1_ar',
        'name_title2_en',
        'name_title2_ar',
        'name_desc2_en',
        'name_desc2_ar',
        'name_title3_en',
        'name_title3_ar',
        'name_desc3_en',
        'name_desc3_ar',
        'created_at',
        'updated_at',
       
    ];
}
