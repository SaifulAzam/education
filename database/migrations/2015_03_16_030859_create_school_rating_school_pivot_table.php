<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolRatingSchoolPivotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school_rating_school', function(Blueprint $table)
		{
			$table->integer('school_rating_id')->unsigned()->index();
			$table->foreign('school_rating_id')->references('id')->on('school_ratings')->onDelete('cascade');
			$table->integer('school_id')->unsigned()->index();
			$table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('school_rating_school');
	}

}
