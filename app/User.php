<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'user_image','username','teams','First_Name','Last_Name'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function roles() {
		return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
	}

	public function hasAnyRole($roles) {
		if (is_array($roles)) {
			foreach ($roles as $role) {
				# code...
				if ($this->hasRole($role)) {
					return true;
				}
			}
		} else {
			if ($this->hasRole($roles)) {
				return true;
			}
		}
	}

	public function hasRole($role) {
		if ($this->roles()->where('name', $role)->first()) {
			return true;
		}
		return false;
	}

	public function Post() {
		return $this->hasMany('App\Post', 'user_id');
	}
    public function Hire()
    {
        return $this->hasMany('App\Hire', 'user_id');
    }
    public function ext()
    {
        return $this->hasMany('App\Experience', 'user_id');
    }
    public function Skill()
    {
        return $this->hasMany('App\Skill', 'user_id');
    }
    public function HireComment()
    {
        return $this->hasMany('App\HireComment', 'user_id');
    }
	public function Product() {
		return $this->hasMany('App\Product', 'user_id');
	}
	public function draftsmen() {
		return $this->hasMany('App\Product', 'draftsmen_id');
	}

	public function address() {
		return $this->hasMany('App\Address');
	}

	public function orders() {
		return $this->hasMany(Order::class);
	}
	public function Informations_users_team() {
		// return $this->belongsTo(Informations_draftsmans::class, 'user_id', 'id');
		return $this->hasOne('App\Informations_users', 'user_id', 'id' ,'type_file','Teams');

	}
	public function Informations_users_de() {
		// return $this->belongsTo(Informations_draftsmans::class, 'user_id', 'id');
		return $this->hasOne('App\Informations_users', 'user_id', 'id' ,'type_file','Draftsman');

	}

}
