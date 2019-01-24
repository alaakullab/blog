<?php

use Illuminate\Database\Seeder;

class Partner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          	\App\Partner::create([
			   'title_ar'=>'Write title Arabic',
			   'title_en'=>'Write title English',
			   'desc_ar'=>'Write something here',
			   'desc_en'=>'Write something here',
			]);  
    }
}
