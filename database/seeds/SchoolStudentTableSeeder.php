<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class SchoolStudentTableSeeder extends Seeder {

    public function run()
    {
        DB::table('school_student')->delete();
        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
            DB::table('school_student')->insert([

                'school_id' => $faker->numberBetween(1, 30),

                'student_id' => $faker->numberBetween(1, 30)

            ]);
        }
    }

}