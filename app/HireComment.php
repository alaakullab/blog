<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HireComment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table    = 'hire_comments';
    protected $fillable = [
        'id',
        'user_id',
        'content',
        'status',
        'creat_time',
        'author',
        'email',
        'url',
        'hire_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function Hire(){
        return $this->belongsTo(Hire::Class);
    }

}
