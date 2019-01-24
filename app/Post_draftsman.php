<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post_draftsman extends Model {


    protected $table = 'post_draftsmans';
    protected $fillable = [
        'user_id',
        'title',
    ];
    public function file() {
        return $this->hasMany('App\Files', 'type_id', 'id','type_file','post_draftsmans');
    }
}
