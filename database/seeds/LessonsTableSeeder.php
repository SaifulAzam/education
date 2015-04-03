<?php

use Faker\Factory as Faker;
use App\Repositories\School\School;
use App\Repositories\Tutor\Tutor;
use Illuminate\Database\Seeder;
use App\Repositories\Lesson\Lesson;

class LessonsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('lessons')->delete();
        $faker = Faker::create();
        $schoolIds = School::lists('id');
        $tutorIds = Tutor::lists('id');

        foreach(range(1, 30) as $index)
        {
            Lesson::create([
                'tutor_id' => $faker->randomElement($tutorIds),
                'school_id' => $faker->randomElement($schoolIds),
                'title' => $faker->sentence(5),
                'body'  => $faker->paragraph(4),
                'published_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
                'some_bool' => $faker->boolean(),
            ]);
        }
    }
}