<?php

use Illuminate\Database\Seeder;
use App\Repositories\Coupon\Coupon;
use Faker\Factory as Faker;

class CouponsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('coupons')->delete();
        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
            Coupon::create([
                'school_id'             => $faker->numberBetween(1, 30),
                'tutor_id'              => $faker->numberBetween(1, 30),
                'title'                 => $faker->sentence(5),
                'body'                  => $faker->paragraph(5),
                'original_price'        => $faker->numberBetween('1000', '10000'),
                'coupon_price'          => $faker->numberBetween('1000', '10000'),
                'class_count'           => $faker->numberBetween(1, 30),
                'class_type'            => $faker->word(4),
            ]);
        }

    }

}