<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class StudentTagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('student_tag')->delete();
        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
            DB::table('student_tag')->insert([

                'tag_id' => $faker->numberBetween(1, 10),

                'student_id' => $faker->numberBetween(1, 30)

            ]);
        }
    }

}