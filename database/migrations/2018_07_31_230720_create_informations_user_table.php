<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsUserTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('informations_users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('about_me')->default('enter abute me');
			$table->string('Address')->default('enter address');
			$table->enum('Gender',['male','female'])->default('male');
			$table->integer('Phone')->default();
			$table->string('type_file');
			$table->string('linkedin')->default('www.linkedin.com/');
			$table->string('instagram')->default('www.instagram.com/');
			$table->string('facebook')->default('www.facebook.com/');
			$table->string('twitter')->default('www.twitter.com/');
			$table->string('pinterest')->default('www.pinterest.com/');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('draftsmen');
	}
}
