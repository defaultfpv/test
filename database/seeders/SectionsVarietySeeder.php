<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SectionsVarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections_variety')->insert([
            ['section_id' => 1, 'variety_id' => 1],
            ['section_id' => 2, 'variety_id' => 1]
        ]);
    }
}
