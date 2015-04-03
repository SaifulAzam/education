<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('school_ratings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('school_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('level');
			$table->decimal('overall');
			$table->integer('environment');
			$table->integer('attitude');
			$table->integer('price');
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
		Schema::drop('school_ratings');
	}

}
