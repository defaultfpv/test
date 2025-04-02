<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsOptionsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $numberOfRecords =751; // Количество записей

        for ($i = 1; $i < $numberOfRecords; $i++) {
            DB::table('products_options')->insert([
                'product_id' => $faker->numberBetween(1, 250),
                'option_id' => $faker->numberBetween(1, 32),
            ]);
        }
    }
}