<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SectionsFiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Пример заполнения таблицы sections_filters
        DB::table('sections_filters')->insert([
            ['section_id' => 1, 'filter_id' => 1],
            ['section_id' => 1, 'filter_id' => 2],
            ['section_id' => 1, 'filter_id' => 3],
            ['section_id' => 1, 'filter_id' => 4],
            ['section_id' => 1, 'filter_id' => 5],

            ['section_id' => 2, 'filter_id' => 1],
            ['section_id' => 2, 'filter_id' => 2],
            ['section_id' => 2, 'filter_id' => 3],
            ['section_id' => 2, 'filter_id' => 4],
            ['section_id' => 2, 'filter_id' => 6],

            ['section_id' => 3, 'filter_id' => 1],
            ['section_id' => 3, 'filter_id' => 2],
            ['section_id' => 3, 'filter_id' => 3],
            ['section_id' => 3, 'filter_id' => 4],

            ['section_id' => 4, 'filter_id' => 1],
            ['section_id' => 4, 'filter_id' => 2],
            ['section_id' => 4, 'filter_id' => 3],
            ['section_id' => 4, 'filter_id' => 4],

            ['section_id' => 5, 'filter_id' => 1],
            ['section_id' => 5, 'filter_id' => 2],
            ['section_id' => 5, 'filter_id' => 3],
            ['section_id' => 5, 'filter_id' => 4],
            ['section_id' => 5, 'filter_id' => 7],

            ['section_id' => 6, 'filter_id' => 1],
            ['section_id' => 6, 'filter_id' => 2],
            ['section_id' => 6, 'filter_id' => 3],
            ['section_id' => 6, 'filter_id' => 8],



        ]);
    }
}
