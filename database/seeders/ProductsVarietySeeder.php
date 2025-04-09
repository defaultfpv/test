<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsVarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products_variety')->insert([
            ['variety_id' => 1, 'product_id' => 1, 'variety_description' => '1 кг', 'price' => 3199],
            ['variety_id' => 1, 'product_id' => 1, 'variety_description' => '3 кг', 'price' => 8999],
            ['variety_id' => 1, 'product_id' => 1, 'variety_description' => '10 кг', 'price' => 10999],

            ['variety_id' => 1, 'product_id' => 2, 'variety_description' => '1 кг', 'price' => 2199],
            ['variety_id' => 1, 'product_id' => 2, 'variety_description' => '3 кг', 'price' => 7999],
            ['variety_id' => 1, 'product_id' => 2, 'variety_description' => '10 кг', 'price' => 9999],
            
            ['variety_id' => 1, 'product_id' => 6, 'variety_description' => '2 кг', 'price' => 3495],
            ['variety_id' => 1, 'product_id' => 6, 'variety_description' => '7 кг', 'price' => 11055],
            ['variety_id' => 1, 'product_id' => 6, 'variety_description' => '14 кг', 'price' => 18965]
        ]);
    }
}
