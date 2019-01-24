<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model {
	protected $table = 'wishlists';
	protected $fillable = [
		'id',
		'user_id',
		'product_id',
		'created_at',
		'updated_at',
	];
	public function product() {
		return $this->hasMany(Product::Class);
	}
}
