<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nickname');
			$table->string('gender');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('cellphone')->unique();
			$table->string('password', 60);
			$table->boolean('is_tutor')->default(0);
			$table->boolean('tutor_complete')->default(0);
			$table->boolean('student_complete')->default(0);
			$table->string('photo');
			$table->rememberToken();
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
		Schema::drop('users');
	}

}
