<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonStudentPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lesson_student', function(Blueprint $table)
		{
			$table->integer('lesson_id')->unsigned()->index();
			$table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
			$table->integer('student_id')->unsigned()->index();
			$table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
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
		Schema::drop('lesson_student');
	}

}
