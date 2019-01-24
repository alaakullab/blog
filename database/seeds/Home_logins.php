<?php

use Illuminate\Database\Seeder;

class Home_logins extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\HomeLogin::create([
            'title_ar'=>'Write title Arabic',
            'title_en'=>'Write title English',
            'name_title1_en'=>'Write something here',
            'name_title1_ar'=>'Write something here',
            'name_desc1_en'=>'Write something here',
            'name_desc1_ar'=>'Write something here',
            'name_title2_en'=>'Write something here',
            'name_title2_ar'=>'Write something here',
            'name_desc2_en'=>'Write something here',
            'name_desc2_ar'=>'Write something here',
            'name_title3_en'=>'Write something here',
            'name_title3_ar'=>'Write something here',
            'name_desc3_en'=>'Write something here',
            'name_desc3_ar'=>'Write something here',
         ]);  
    }
}
