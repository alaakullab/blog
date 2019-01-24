<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informations_users extends Model {
	protected $table = 'informations_users';
	protected $fillable = [
		'about_me',
		'Address',
		'Gender',
		'Phone',
		'type_file',
		'user_id',

	];
	// public function user() {
	// 	return $this->belongsTo('App\User', 'id', 'user_id');

	// }

	public function user() {
		return $this->belongsTo('App\User');
	}
}
