<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->string('url');
			$table->string('thumbnail_url');
			$table->string('video_ID');
			$table->string('video_AutherID');
			$table->integer('user_id');
			$table->integer('analytic_id');
			$table->integer('category_id');
			$table->boolean('flagged')->default(0);
			$table->integer('backs')->default(1);
			$table->integer('attacks')->default(0);
			$table->boolean('nsfw')->default(false);
			$table->boolean('gore')->default(false);
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
		Schema::drop('posts');
	}

}
