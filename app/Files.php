<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Files extends Model {
	use SoftDeletes;
	protected $table = 'files';
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'admin_id',
		'user_id',
		'file',
		'full_path',
		'type_file',
		'type_id',
		'path',
		'ext',
		'name',
		'size',
		'size_bytes',
		'mimtype',
	];
	public function product() {
		return $this->belongsTo(Product::Class, 'id', 'type_id');
	}
	public function post_draftsman() {
		return $this->belongsTo(post_draftsman::Class, 'id', 'type_id');
	}
}
