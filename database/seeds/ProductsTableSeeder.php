<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Let's truncate our existing records to start from scratch.
        Product::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => $faker->name,
                'type' => $faker->sentence,
                'price' => $faker->numberBetween(10, 5000)
            ]);
        }
    }

}
