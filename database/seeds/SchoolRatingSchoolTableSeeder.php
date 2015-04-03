<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\School\SchoolRating;
use App\Repositories\School\School;


class SchoolRatingSchoolTableSeeder extends Seeder {

    public function run()
    {
        DB::table('school_rating_school')->delete();
        $faker = Faker::create();

        $schoolIds = School::lists('id');
        $schoolRatingIds = SchoolRating::lists('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('school_rating_school')->insert([

                'school_id' => $faker->randomElement($schoolIds),

                'school_rating_id' => $faker->randomElement($schoolRatingIds)

            ]);
        }
    }

}