<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    
            protected $table    = 'settings';
protected $fillable = [
		'id',
		'site_name',
		'site_desc',
		'mail',
'phone',
'maintenance',
'copyright',
'Maintenance_message',
'facebook',
'twitter',
'instagram',
'keyword',

		'created_at',
		'updated_at',
	];
}
