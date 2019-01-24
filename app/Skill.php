<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = "skills";
    protected $fillable = [
        'user_id',
        'name',
        'level',
    ];
    public function user() {
        return $this->belongsTo(User::Class);
    }
}
