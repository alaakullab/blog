<?php

use Illuminate\Database\Seeder;

class User extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		\App\User::create([

			'username' => 'User',
			'email' => 'admin@admin.com',
			'password' => bcrypt(123456),
		]);}
}
