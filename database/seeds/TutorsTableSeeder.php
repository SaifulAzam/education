<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\Tutor\Tutor;

class TutorsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tutors')->delete();
        $faker = Faker::create();

        foreach(range(1, 5) as $index)
        {
            Tutor::create([
                'name'             => $faker->name,
                'user_id'          => $index,
                'bio'              => $faker->paragraph(4),
                'occupation'       => $faker->word(),
            ]);
        }
    }

}