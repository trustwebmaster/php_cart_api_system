<?php

namespace Database\Seeders;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            \DB::table('products')->insert([
                'Name' => $faker->word,
                'price' => $faker->numberBetween($min = 1, $max = 1000),
                'description' => $faker->text,
                'Category' => $faker->word,
                'UnitsInStock' => $faker->numberBetween($min = 1, $max = 50),
            ]);
        }
    }
}
