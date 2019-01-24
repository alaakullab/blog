<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            	\App\Role::create([
			   'name'=>'User',
			   'description'=>'this is user',
			]);
				\App\Role::create([
			   'name'=>'Editor',
			   'description'=>'this is Editor',
			]);
				\App\Role::create([
			   'name'=>'Draftsman',
			   'description'=>'this is user Draftsman',
			]);
    }
}
