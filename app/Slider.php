<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   protected $table    = 'sliders';
protected $fillable = [
		'id',
		'title_ar',
		'title_en',
		'desc_ar',
		'desc_en',
		'image_slider',
		'type_file',
		'created_at',
		'updated_at',
	];
}
