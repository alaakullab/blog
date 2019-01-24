<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('site_name_ar');
            $table->string('site_name_en');
            $table->text('site_desc_ar');
            $table->text('site_desc_en');
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('copyright');
            $table->string('mail')->nullable();
            $table->string('keyword')->nullable();
            $table->text('Maintenance_message')->nullable();
            $table->string('phone');
            $table->enum('maintenance',['open','close']);
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
