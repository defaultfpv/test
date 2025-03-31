<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PetsCatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Пример заполнения таблицы pets_catalog
        DB::table('pets_catalog')->insert([
            ['catalog_id' => 1, 'pet_id' => 1],
            ['catalog_id' => 1, 'pet_id' => 2],
            ['catalog_id' => 1, 'pet_id' => 3],
            ['catalog_id' => 1, 'pet_id' => 4],
            ['catalog_id' => 1, 'pet_id' => 5],

            ['catalog_id' => 2, 'pet_id' => 1],
            ['catalog_id' => 2, 'pet_id' => 2],
            ['catalog_id' => 2, 'pet_id' => 3],
            ['catalog_id' => 2, 'pet_id' => 4],
            ['catalog_id' => 2, 'pet_id' => 5],

            ['catalog_id' => 3, 'pet_id' => 1],
            ['catalog_id' => 3, 'pet_id' => 2],
            ['catalog_id' => 3, 'pet_id' => 3],
            ['catalog_id' => 3, 'pet_id' => 4],

            ['catalog_id' => 4, 'pet_id' => 1],
            ['catalog_id' => 4, 'pet_id' => 2],
            ['catalog_id' => 4, 'pet_id' => 3],
            ['catalog_id' => 4, 'pet_id' => 4],
            ['catalog_id' => 4, 'pet_id' => 5],

            ['catalog_id' => 5, 'pet_id' => 1],
            ['catalog_id' => 5, 'pet_id' => 2],

            ['catalog_id' => 6, 'pet_id' => 1],
            ['catalog_id' => 6, 'pet_id' => 2],
            ['catalog_id' => 6, 'pet_id' => 4],

        ]);
    }
}
