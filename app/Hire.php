<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    protected $table    = 'hires';
    protected $fillable = [
        'id',
        'title',
        'email',
        'description',
        'file',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function HireComment() {
        return $this->hasMany(HireComment::Class);
    }
    public function user() {
        return $this->belongsTo(User::Class);
    }
}
