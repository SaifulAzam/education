<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('owner_type');
			$table->integer('owner_id');
			$table->integer('author_id');
			$table->string('author_name');
			$table->integer('parent_id')->nullable();
			$table->integer('child_count')->defaults(0);
			$table->integer('most_recent_child_id')->nullable();
			$table->text('body');
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
		Schema::drop('comments');
	}

}
