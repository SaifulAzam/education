<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Repositories\Coupon\Coupon;
use App\Repositories\Tag\Tag;


class CouponTagTableSeeder extends Seeder {

    public function run()
    {
        DB::table('coupon_tag')->delete();
        $faker = Faker::create();

        $couponIds = Coupon::lists('id');
        $tagIds = Tag::lists('id');

        foreach(range(1, 30) as $index)
        {
            DB::table('coupon_tag')->insert([

                'coupon_id' => $faker->randomElement($couponIds),

                'tag_id' => $faker->randomElement($tagIds)

            ]);
        }
    }

}