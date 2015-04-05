<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\School\School;

class SchoolsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('schools')->delete();
        $faker = Faker::create();
        $locations = ['城东', '城西', '城北', '城南', '泗门', '丈亭', '梁弄'];

        foreach(range(1, 30) as $index)
        {
            School::create([
                'name'             => $faker->name,
                'phone'            => $faker->numberBetween($min = 10000000000, $max = 19999999999),
                'email'            => $faker->freeEmail(),
                'location'         => $faker->randomElement($locations),
                'good_count'       => $faker->numberBetween($min = 1, $max = 50),
                'viewer_count'     => $faker->numberBetween($min = 1, $max = 50),
                'overall'          => $faker->numberBetween($min = 1, $max = 50),
                'admin_count'      => $faker->numberBetween($min = 1, $max = 5),
                'bio'              => $faker->paragraph(4),
                'founding_time'    => $faker->year($max = 'now'),
                'tutor_count'      => $faker->numberBetween($min = 1, $max = 30),
                'student_count'    => $faker->numberBetween($min = 1, $max = 50)
            ]);
        }
    }

}