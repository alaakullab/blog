<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_logins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('name_title1_en');
            $table->string('name_title1_ar');
            $table->string('name_desc1_en');
            $table->string('name_desc1_ar');
            $table->string('name_title2_en');
            $table->string('name_title2_ar');
            $table->string('name_desc2_en');
            $table->string('name_desc2_ar');
            $table->string('name_title3_en');
            $table->string('name_title3_ar');
            $table->string('name_desc3_en');
            $table->string('name_desc3_ar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_logins');
    }
}
