<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;


// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class Post extends Model {
	use SoftDeletes;
	use Rateable;

	protected $dates = ['deleted_at'];

	protected $table = 'posts';
	protected $fillable = [
		'id',
		'admin_id',
		'title_en',
		'title_ar',
		'content_ar',
		'content_en',
		'image_post',
		'slugs',
		'status',
		'user_id',
		'tag_id',
		'created_at',
		'updated_at',
		'deleted_at',
	];

	public function comments() {
		return $this->hasMany(Comment::Class);
	}
	public function user() {
		return $this->belongsTo(User::Class);
	}
	public function tag() {
		return $this->belongsTo(Tag::Class);
	}
}
