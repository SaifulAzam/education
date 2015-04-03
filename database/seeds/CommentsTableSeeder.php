<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Repositories\Comment\Comment;
use App\Repositories\Lesson\Lesson;
use App\Repositories\School\School;
use App\Repositories\Tutor\Tutor;
use App\Repositories\Article\Article;
use App\Repositories\Coupon\Coupon;

class CommentsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('comments')->delete();
        $faker = Faker::create();
        /*$lessonIds = Lesson::lists('id');
        $schoolIds = School::lists('id');
        $tutorIds = Tutor::lists('id');
        $articleIds = Article::lists('id');
        $couponIds = Coupon::lists('id');*/

        foreach(range(1, 30) as $index)
        {
            Comment::create([
                'user_id'       => $faker->numberBetween(1,5),
                /*'lesson_id'     => $faker->randomElement($lessonIds),
                'school_id'     => $faker->randomElement($schoolIds),
                'tutor_id'      => $faker->randomElement($tutorIds),
                'article_id'    => $faker->randomElement($articleIds),
                'coupon_id'     => $faker->randomElement($couponIds),*/
                'body'       => $faker->paragraph(4),
            ]);
        }
    }
}