<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder {


	private $tables = [
		'lessons',
		'tags',
		'lesson_tag'
	];

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->cleanDatabase();
		$this->call('UserTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('ArticlesTableSeeder');
		$this->call('CouponsTableSeeder');
		$this->call('CouponTagTableSeeder');
		/*$this->call('SchoolsTableSeeder');
		$this->call('TutorsTableSeeder');
		$this->call('SchoolTagTableSeeder');
		$this->call('SchoolRatingTableSeeder');
		$this->call('TutorRatingTableSeeder');
		$this->call('TagTutorTableSeeder');
		$this->call('StudentsTableSeeder');
		//$this->call('CommentsTableSeeder');
		$this->call('ArticleTagTableSeeder');
		$this->call('LessonsTableSeeder');
		$this->call('LessonTagTableSeeder');
		$this->call('SubjectTableSeeder');
		$this->call('StudentTutorTableSeeder');
		$this->call('LessonStudentTableSeeder');
		$this->call('SchoolStudentTableSeeder');
		$this->call('StudentTagTableSeeder');*/
	}

	public function cleanDatabase()
	{
		DB::statement('SET foreign_key_checks=0;');


		foreach ($this->tables as $tablename) {
			DB::table($tablename)->truncate();
		}

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}

class UserTableSeeder extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		$faker = Faker::create();
		/*foreach(range(1, 30) as $index)
		{
			User::create([
				'username' 	=> $faker->userName,
				'email'		=> $faker->email,
				'password'	=> Hash::make("admin"),
				'nickname'	=> $faker->name,
				'cellphone' => $faker->numberBetween(10000000000, 19999999999),
			]);
		}*/
		User::create([
			'username' 	=> 'ad',
			'email'		=> 'admin@gmail.com',
			'password'	=> Hash::make("admin"),
			'nickname'	=> 'Rain',
			'cellphone' => '13429239110',
			'tutor_complete' => '1',
			'student_complete' => '1'
		]);
	}

}
