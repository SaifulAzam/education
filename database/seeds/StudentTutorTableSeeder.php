<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class StudentTutorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('student_tutor')->delete();
        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
            DB::table('student_tutor')->insert([

                'tutor_id' => $faker->numberBetween(1, 30),

                'student_id' => $faker->numberBetween(1, 30)

            ]);
        }
    }

}