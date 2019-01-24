<?php

use Illuminate\Database\Seeder;

class PostDB extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0 ; $i < 50 ; $i++){
            \App\Post::create([
                'admin_id'     => '1',
                'title_ar'    => 'عنوان'.$i,
                'title_en' => 'title '.$i,
                'content_ar' => 'محتوتى محتوتى محتوتى محتوتى محتوتى محتوتى محتوتىمحتوتى'.$i,
                'content_en' => 'content content content content content content content'.$i,
                'status' => 'yes',
                'image_post' => 'post/image.jpg',
                'user_id' => '1',
                'tag_id' => '1',
            ]);
        }
    }
}
