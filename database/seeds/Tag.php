<?php

use Illuminate\Database\Seeder;

class Tag extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          	\App\Tag::create([
			   'name_ar'=>'وسم 1',
			   'name_en'=>'tag1',
			   'admin_id'=>'1',
			]);  
    }
}
