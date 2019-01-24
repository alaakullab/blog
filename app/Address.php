<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['addressesline', 'city', 'state', 'zip', 'phone', 'country', 'user_id'];
//    public function user(){
//        return $this->belongsTo(User::class);
//    }
}
