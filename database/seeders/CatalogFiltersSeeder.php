<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CatalogFiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Пример заполнения таблицы catalog_filters
        DB::table('catalog_filters')->insert([
            ['catalog_id' => 1, 'filter_id' => 1],
            ['catalog_id' => 1, 'filter_id' => 2],
            ['catalog_id' => 1, 'filter_id' => 3],
            ['catalog_id' => 1, 'filter_id' => 4],
            ['catalog_id' => 1, 'filter_id' => 5],

            ['catalog_id' => 2, 'filter_id' => 1],
            ['catalog_id' => 2, 'filter_id' => 2],
            ['catalog_id' => 2, 'filter_id' => 3],
            ['catalog_id' => 2, 'filter_id' => 4],
            ['catalog_id' => 2, 'filter_id' => 6],

            ['catalog_id' => 3, 'filter_id' => 1],
            ['catalog_id' => 3, 'filter_id' => 2],
            ['catalog_id' => 3, 'filter_id' => 3],
            ['catalog_id' => 3, 'filter_id' => 4],

            ['catalog_id' => 4, 'filter_id' => 1],
            ['catalog_id' => 4, 'filter_id' => 2],
            ['catalog_id' => 4, 'filter_id' => 3],
            ['catalog_id' => 4, 'filter_id' => 4],

            ['catalog_id' => 5, 'filter_id' => 1],
            ['catalog_id' => 5, 'filter_id' => 2],
            ['catalog_id' => 5, 'filter_id' => 3],
            ['catalog_id' => 5, 'filter_id' => 4],
            ['catalog_id' => 5, 'filter_id' => 7],

            ['catalog_id' => 6, 'filter_id' => 1],
            ['catalog_id' => 6, 'filter_id' => 2],
            ['catalog_id' => 6, 'filter_id' => 3],
            ['catalog_id' => 6, 'filter_id' => 8],



        ]);
    }
}
