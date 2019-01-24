<?php

use Illuminate\Database\Seeder;

class Service extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                for ($i = 0 ; $i < 3 ; $i++){

           	\App\Service::create([
			   'title_ar'=>'Write title Arabic',
			   'title_en'=>'Write title English',
			   'desc_ar'=>'Write something here',
			   'desc_en'=>'Write something here',
			]); 
            } 
    }
}
