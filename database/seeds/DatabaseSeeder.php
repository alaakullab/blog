<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(Role::class );
		$this->call(Slider::class );
		$this->call(Admin::class );
		$this->call(User::class );
        $this->call(User_role::class );
        $this->call(Tag::class );
        $this->call(PostDB::class );
		$this->call(Partner::class );
		$this->call(Service::class );
		$this->call(Setting::class );
		$this->call(Home_logins::class );

    }
}
