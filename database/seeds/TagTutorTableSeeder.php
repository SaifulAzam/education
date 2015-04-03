<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\Tutor\Tutor;
use App\Repositories\Tag\Tag;


class TagTutorTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tag_tutor')->delete();
        $faker = Faker::create();

        $tutorIds = Tutor::lists('id');
        $tagIds = Tag::lists('id');

        foreach(range(1, 5) as $index)
        {
            DB::table('tag_tutor')->insert([

                'tutor_id' => $faker->randomElement($tutorIds),

                'tag_id' => $faker->randomElement($tagIds)

            ]);
        }
    }

}