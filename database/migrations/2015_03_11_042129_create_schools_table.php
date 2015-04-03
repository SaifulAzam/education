<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schools', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('phone');
			$table->string('email');
			$table->integer('admin_count');
			$table->text('bio');
			$table->string('weibo')->default('official_weibo_id');
			$table->string('weixin')->default('official_wechat_id');
			$table->string('qq')->default('official_qq');
			$table->integer('founding_time');
			$table->text('address');
			$table->string('location');
			$table->integer('tutor_count');
			$table->integer('student_count');
			$table->integer('good_count');
			$table->integer('average_count');
			$table->integer('bad_count');
			$table->integer('overall');
			$table->integer('viewer_count');
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
		Schema::drop('schools');
	}

}
