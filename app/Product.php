<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $table = 'products';
	protected $fillable = [
		'id',
		'user_id',
		'product_name_ar',
		'product_name_en',
		'description_ar',
		'description_en',
		'department_id',
		'price',
		'draftsmen_id',
		'qyt',
		'created_at',
		'updated_at',
	];
	public function department() {
		//        return $this->hasMany('App\Product');
		return $this->belongsTo(Department::class);
	}
	public function wishlist() {
		return $this->belongsTo(Wishlist::class);
	}
	public function user() {
		return $this->belongsTo(User::Class);
	}
	public function draftsmen() {
		return $this->belongsTo(User::Class,'draftsmen_id','id');
	}
	public function file() {
//        return $this->morphedByMany('App\Files', 'type_id', 'id','type_file','products');

		return $this->hasMany('App\Files','type_id', 'id','type_file','products' );
	}
}
