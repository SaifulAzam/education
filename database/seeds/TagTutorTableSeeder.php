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

        $tagIds = Tag::lists('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('tag_tutor')->insert([

                'tutor_id' => $faker->numberBetween(1,30),

                'tag_id' => $faker->randomElement($tagIds)

            ]);
        }
    }

}