<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Auto Schema  By Baboon Script
// Baboon Maker has been Created And Developed By [It V 1.0 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.0 | https://it.phpanonymous.com]
class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('admin_id')->unsigned()->nullable();
			$table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
			$table->string('title_ar')->nullable();
			$table->string('title_en')->nullable();
			$table->longtext('content_ar')->nullable();
			$table->longtext('content_en')->nullable();
			$table->string('image_post')->nullable();
			$table->string('keyword')->nullable();
			$table->enum('status', ['yes', 'no']);
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('tag_id')->unsigned();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('posts');
	}
}
