<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\Article\Article;
use App\Repositories\Tag\Tag;


class ArticleTagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('article_tag')->delete();
        $faker = Faker::create();

        $articleIds = Article::lists('id');
        $tagIds = Tag::lists('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('article_tag')->insert([

                'article_id' => $faker->randomElement($articleIds),

                'tag_id' => $faker->randomElement($tagIds)

            ]);
        }
    }

}