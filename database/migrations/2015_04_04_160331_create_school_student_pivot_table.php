<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolStudentPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school_student', function(Blueprint $table)
		{
			$table->integer('school_id')->unsigned()->index();
			$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
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
		Schema::drop('school_student');
	}

}
