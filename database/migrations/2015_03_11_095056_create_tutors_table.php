<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('school_id')->unsigned();
			$table->string('name');
			$table->text('bio');
			$table->string('experience');
			$table->string('occupation');
			$table->string('capable_grade');
			$table->integer('student_count');
			$table->string('weibo')->default('这家伙很懒');
			$table->string('weixin')->default('这家伙很懒');
			$table->string('qq')->default('这家伙很懒');
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
		DB::statement('SET foreign_key_checks=0;');

		Schema::drop('tutors');
	}

}
