<?php

use Faker\Factory as Faker;
use App\Repositories\Tag\Tag;


class TagsTableSeeder extends DatabaseSeeder {

    public function run()
    {
        DB::table('tags')->delete();
        $faker = Faker::create();
        $tags = ['数学', '语文', '科学', '物理', '化学', '政治', '历史', '英语', '生物', '编程'];

        foreach(range(0, 9) as $index)
        {
            Tag::create([

                'name' => $tags[$index]

            ]);
        }
    }

}