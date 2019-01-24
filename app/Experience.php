<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = "experiences";
    protected $fillable = [
      'user_id',
      'exp',
    ];
    public function user() {
        return $this->belongsTo(User::Class);
    }
}
