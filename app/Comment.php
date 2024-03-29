<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class Comment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'comments';
    protected $fillable = [
        'id',
        'admin_id',
        'content',
        'status',
        'creat_time',
        'author',
        'email',
        'url',
        'post_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function post()
    {
        return $this->belongsTo(Post::Class);
    }

}
