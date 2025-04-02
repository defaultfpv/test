<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $numberOfRecords =250; // Количество записей

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('products')->insert([
                'title' => $faker->text(15),
                'description' => $faker->text(150),
                'structure' => $faker->text(500),
                'features' => $faker->text(500),
                'number_of_sales' => $faker->numberBetween(40, 400),
                'sections_pets_id' => $faker->numberBetween(1, 24),
                'quantity' => $faker->numberBetween(15, 500),
                'price' => $faker->numberBetween(200, 5000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}