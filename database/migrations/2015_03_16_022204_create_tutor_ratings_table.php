<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutor_ratings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('level');
			$table->decimal('overall');
			$table->integer('helpfulness');
			$table->integer('attitude');
			$table->integer('clarity');
			$table->integer('easiness');
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
		Schema::drop('tutor_ratings');
	}

}
