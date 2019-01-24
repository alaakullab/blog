<?php

use Illuminate\Database\Seeder;

class Slider extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                for ($i = 1 ; $i < 4 ; $i++){

           	\App\Slider::create([
			   'title_ar'=>'Write title Arabic',
			   'title_en'=>'Write title English',
			   'desc_ar'=>'Write something here',
               'desc_en'=>'Write something here',
               'type_file'=>'homePage',
			   'image_slider'=>'slider/homePage/slider-image'.$i.'.jpg',
			]); 
            } 
            for ($i = 1 ; $i < 5 ; $i++){

                \App\Slider::create([
                'title_ar'=>'Write title Arabic',
                'title_en'=>'Write title English',
                'desc_ar'=>'Write something here',
                'desc_en'=>'Write something here',
                'type_file'=>'Ecommerce',
                'image_slider'=>'slider/Ecommerce/slider-image'.$i.'.jpg',
             ]); 
             } 
    }
}
