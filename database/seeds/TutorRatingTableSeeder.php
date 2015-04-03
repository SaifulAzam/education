<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\Tutor\TutorRating;


class TutorRatingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tutor_ratings')->delete();
        $faker = Faker::create();
        $level = ['good', 'average', 'bad'];

        foreach(range(1, 30) as $index)
        {
            $helpfulness = $faker->numberBetween($min = 1, $max = 5);
            $attitude = $faker->numberBetween($min = 1, $max = 5);
            $clarity = $faker->numberBetween($min = 1, $max = 5);
            $easiness = $faker->numberBetween($min = 1, $max = 5);
            $overall = ($helpfulness + $attitude + $clarity + $easiness)/4;
            TutorRating::create([
                'level'         => $faker->randomElement($level),
                'helpfulness'   => $helpfulness,
                'attitude'      => $attitude,
                'clarity'       => $clarity,
                'easiness'      => $easiness,
                'overall'       => $overall
            ]);
        }
    }
}