<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

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
		$this->call('SchoolsTableSeeder');
		$this->call('TutorsTableSeeder');
		$this->call('SchoolTagTableSeeder');
		$this->call('SchoolRatingTableSeeder');
		$this->call('TutorRatingTableSeeder');
		$this->call('TagTutorTableSeeder');
		$this->call('SchoolRatingSchoolTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('StudentsTableSeeder');
		$this->call('ArticlesTableSeeder');
		//$this->call('CommentsTableSeeder');
		$this->call('ArticleTagTableSeeder');
		$this->call('CouponsTableSeeder');
		$this->call('CouponTagTableSeeder');
		$this->call('LessonsTableSeeder');
		$this->call('LessonTagTableSeeder');
		$this->call('SubjectTableSeeder');
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
		User::create([
			'username' 	=> 'ad',
			'email'		=> 'admin@gmail.com',
			'password'	=> Hash::make("admin"),
			'nickname'	=> 'Rain',
			'cellphone' => '13429239110',
			'tutor_complete' => '1',
			'student_complete' => '1'
		]);
		User::create([
			'username' 	=> 'test1',
			'email'		=> 'test1@gmail.com',
			'password'	=> Hash::make("admin"),
			'nickname'	=> 'test1',
			'cellphone' => '13429239111',
			'tutor_complete' => '1',
			'student_complete' => '1'
		]);
		User::create([
			'username' 	=> 'test2',
			'email'		=> 'test2@gmail.com',
			'password'	=> Hash::make("admin"),
			'nickname'	=> 'test2',
			'cellphone' => '13429239112',
			'tutor_complete' => '1',
			'student_complete' => '1'
		]);
		User::create([
			'username' 	=> 'test3',
			'email'		=> 'test3@gmail.com',
			'password'	=> Hash::make("admin"),
			'nickname'	=> 'test3',
			'cellphone' => '13429239113',
			'tutor_complete' => '1',
			'student_complete' => '1'
		]);
		User::create([
			'username' 	=> 'test4',
			'email'		=> 'test4@gmail.com',
			'password'	=> Hash::make("admin"),
			'nickname'	=> 'test4',
			'cellphone' => '13429239114',
			'tutor_complete' => '1',
			'student_complete' => '1'
		]);
	}

}
