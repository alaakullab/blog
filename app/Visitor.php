<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
  protected $table ='visitor_registry';
    protected $fillable = ['ip', 'country', 'clicks', 'created_at', 'updated_at'];
//    public function user(){
//        return $this->belongsTo(User::class);
//    }
}
