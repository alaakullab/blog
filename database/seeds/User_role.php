<?php

use Illuminate\Database\Seeder;

class User_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_role')->insert([
        	'user_id'=>'1',
        	'role_id'=>'2'
        ]);
    }
}
