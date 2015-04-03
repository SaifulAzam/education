<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lessons', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('tutor_id')->nullable();
			$table->unsignedInteger('school_id')->nullable();
			$table->unsignedInteger('subject_id')->nullable();
			$table->string('title');
			$table->text('body');
			$table->integer('price');
			$table->integer('class_count');
			$table->string('class_type');
			$table->string('photo');
			$table->timestamp('published_at');
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
		Schema::drop('lessons');
	}

}
