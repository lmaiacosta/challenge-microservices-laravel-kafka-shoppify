<?php

namespace Database\Seeders;
//use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {


//            Product::factory()
//                ->name($faker->word)
//                ->description($faker->randomHtml)
//                ->price($faker->randomFloat(2,10,10000))
//                ->vendor($faker->word())
//                ->image($faker->image)
//                ->product_type($faker->word)
//                ->quantity($faker->randomNumber(1,3))
//                ->status('published')
//                ->create();
//
//            'name',
//        '',
//        '',
//        '',
//        '',
//        '',
//        '',
//        'image',
//        '',


            \DB::table('products')->insert([
                'name' => $faker->word,
                'description' => $faker->randomHtml,
                'price' => $faker->randomFloat(2, 10, 1000),
                'vendor' => $faker->word,
                'image' => $faker->image,
                'product_type' => $faker->word,
                'quantity' => $faker->randomNumber(1,3),
                'status' => $faker->randomKey(['deleted', 'published', 'draft']),
                'created_at' => $faker->dateTimeThisMonth,
                'updated_at' => $faker->dateTimeThisMonth,
            ]);
        }
    }
}
