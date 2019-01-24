<?php

use Illuminate\Database\Seeder;

class Setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      		\App\Setting::create([
				'site_name_ar'     => 'ادخل اسم الموقع',
				'site_name_en'     => 'enter your name site',
				'site_desc_en'    => 'enter your desc site',
				'site_desc_ar'    => 'enter your desc site ar',
				'copyright'		=> 'enter your copyright© 2016',
				'mail'		=>'enter your mail site',
				'phone'		=> 'enter your phone site',
				'maintenance'		=>'open',
				'facebook' => 'enter your link facebook',
				'keyword' => 'enter keyword',
				'Maintenance_message' => '<p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:#">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>',
			]);
    }
}
