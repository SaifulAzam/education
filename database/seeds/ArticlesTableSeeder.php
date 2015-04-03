<?php

use Illuminate\Database\Seeder;
use App\Repositories\Article\Article;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('articles')->delete();
        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
            Article::create([
                'user_id'       => '1',
                'title'         => $faker->sentence(5),
                'body'          => $faker->paragraph(5),
                'published_at'  => $faker->dateTimeBetween('-2 years', 'now'),
                'picture'       => $faker->imageUrl(336, 212),
            ]);
        }

    }

}