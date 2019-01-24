<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {
	protected $table = 'services';
	protected $fillable = [
		'id',
		'admin_id',
		'title_ar',
		'title_en',
		'desc_ar',
		'desc_en',
		'created_at',
		'updated_at',
	];
}
