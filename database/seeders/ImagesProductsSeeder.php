<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ImagesProductsSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        $numberOfRecords = 251; // Количество записей
        $x = 1;
        for ($i = 1; $i < $numberOfRecords; $i++) {
            DB::table('images_products')->insert([
                'image_id' => $x,
                'product_id' => $i,
            ]);
            $x++;
            DB::table('images_products')->insert([
                'image_id' => $x,
                'product_id' => $i,
            ]);
            $x++;
            DB::table('images_products')->insert([
                'image_id' => $x,
                'product_id' => $i,
            ]);
            $x++;
        }
    }
}
