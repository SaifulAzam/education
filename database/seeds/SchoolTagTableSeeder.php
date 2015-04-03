<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\School\School;
use App\Repositories\Tag\Tag;


class SchoolTagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('school_tag')->delete();
        $faker = Faker::create();

        $schoolIds = School::lists('id');
        $tagIds = Tag::lists('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('school_tag')->insert([

                'school_id' => $faker->randomElement($schoolIds),

                'tag_id' => $faker->randomElement($tagIds)

            ]);
        }
    }
}