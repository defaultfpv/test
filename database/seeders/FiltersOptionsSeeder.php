<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FiltersOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Пример заполнения таблицы filters_options
        DB::table('filters_options')->insert([
            ['filter_id' => 2, 'option_id' => 1],
            ['filter_id' => 2, 'option_id' => 2],
            ['filter_id' => 2, 'option_id' => 3],
            ['filter_id' => 2, 'option_id' => 4],
            ['filter_id' => 2, 'option_id' => 5],
            ['filter_id' => 2, 'option_id' => 6],
            ['filter_id' => 2, 'option_id' => 7],

            ['filter_id' => 3, 'option_id' => 8],
            ['filter_id' => 3, 'option_id' => 9],
            ['filter_id' => 3, 'option_id' => 10],

            ['filter_id' => 4, 'option_id' => 11],
            ['filter_id' => 4, 'option_id' => 12],
            ['filter_id' => 4, 'option_id' => 13],
            ['filter_id' => 4, 'option_id' => 14],

            ['filter_id' => 5, 'option_id' => 15],
            ['filter_id' => 5, 'option_id' => 16],
            ['filter_id' => 5, 'option_id' => 17],
            ['filter_id' => 5, 'option_id' => 18],

            ['filter_id' => 6, 'option_id' => 19],
            ['filter_id' => 6, 'option_id' => 20],
            ['filter_id' => 6, 'option_id' => 21],
            ['filter_id' => 6, 'option_id' => 22],

            ['filter_id' => 7, 'option_id' => 23],
            ['filter_id' => 7, 'option_id' => 24],
            ['filter_id' => 7, 'option_id' => 25],
            ['filter_id' => 7, 'option_id' => 26],
            ['filter_id' => 7, 'option_id' => 27],
            ['filter_id' => 7, 'option_id' => 28],

            ['filter_id' => 8, 'option_id' => 29],
            ['filter_id' => 8, 'option_id' => 30],
            ['filter_id' => 8, 'option_id' => 31],
            ['filter_id' => 8, 'option_id' => 32],



        ]);
    }
}

