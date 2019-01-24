<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class Tag extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	protected $table = 'tags';
	protected $fillable =
		[
		'id',
		'admin_id',
		'name_ar',
		'name_en',
		'image_tag',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	public function Post() {
		return $this->hasMany('App\Post', 'user_id');
	}
}
