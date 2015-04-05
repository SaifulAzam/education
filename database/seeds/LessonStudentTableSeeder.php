<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class LessonStudentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('lesson_student')->delete();
        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
            DB::table('lesson_student')->insert([

                'lesson_id' => $faker->numberBetween(1, 30),

                'student_id' => $faker->numberBetween(1, 30)

            ]);
        }
    }

}