<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\School\SchoolRating;
use App\Repositories\School\School;
use App\User;

class SchoolRatingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('school_ratings')->delete();
        $faker = Faker::create();
        $schoolIds = School::lists('id');
        $userIds = User::lists('id');
        $level = ['good', 'average', 'bad'];

        foreach(range(1, 100) as $index)
        {
            $environment = $faker->numberBetween($min = 1, $max = 5);
            $attitude = $faker->numberBetween($min = 1, $max = 5);
            $price = $faker->numberBetween($min = 1, $max = 5);
            $overall = ($environment + $attitude + $price)/3;
            SchoolRating::create([
                'level'         => $faker->randomElement($level),
                'school_id'     => $faker->randomElement($schoolIds),
                'user_id'       => $faker->randomElement($userIds),
                'environment'   => $environment,
                'attitude'      => $attitude,
                'price'         => $price,
                'overall'       => $overall
            ]);
        }
    }

}