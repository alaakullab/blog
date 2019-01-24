<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_news extends Model
{
    protected $table = 'new_news';
    protected $fillable = [
        'id',
        'email_news',
    ];
}
