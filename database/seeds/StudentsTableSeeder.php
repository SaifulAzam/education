<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\Student\Student;
use App\User;

class StudentsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('students')->delete();
        $faker = Faker::create();
        $userIds = User::lists('id');

        foreach(range(1, 5) as $index)
        {
            Student::create([
                'name'             => $faker->name,
                'user_id'          => $faker->randomElement($userIds),
                'grade'            => $faker->word(),
                'desired_tutor'    => $faker->word(),
            ]);
        }
    }

}