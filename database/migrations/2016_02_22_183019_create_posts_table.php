<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('permalink');
			$table->string('title');
			$table->text('content');
			$table->boolean('is_page')->default(false);
			$table->softDeletes();
			$table->timestamps();
			$table->index('permalink');
		});

		DB::table('posts')->insert(
		    array(
		        'user_id' => 1,
		        'permalink' => 'about',
		        'title' => 'Hakkımda',
		        'content' => '<p>Hakkımda herşey!!</p><p> Son Çalışmalarım</p>',
		        'is_page' => true,
		        'created_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
		        'updated_at' => Carbon\Carbon::now()->format('Y-m-d H:i:s'),
		    )
		);
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
