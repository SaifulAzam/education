<?php

use Faker\Factory as Faker;
use App\Repositories\Lesson\Lesson;
use App\Repositories\Tag\Tag;

class LessonTagTableSeeder extends DatabaseSeeder {

    public function run()
    {
        DB::table('lesson_tag')->delete();
        $faker = Faker::create();

        $lessonIds = Lesson::lists('id');
        $tagIds = Tag::lists('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('lesson_tag')->insert([

                'lesson_id' => $faker->randomElement($lessonIds),

                'tag_id' => $faker->randomElement($tagIds)

            ]);
        }
    }

}