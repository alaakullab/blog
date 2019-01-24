<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class Department extends Model
{
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    protected $table = 'departments';
    protected $fillable = [
        'id',
        'admin_id',
        'dep_name_ar',
        'dep_name_en',
        'description_ar',
        'description_en',
        'keyword',
        'image_dep',
        'parent_id',
        'created_at',
        'updated_at',
// 'deleted_at',
    ];

    public function parent()
    {
        return $this->hasMany('App\Department', 'id', 'parent_id');
    }

    public function products()
    {
        //        return $this->hasMany('App\Product');
        return $this->hasMany(Product::class);
    }
}
