<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class VarietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Пример заполнения таблицы variety
        DB::table('variety')->insert([
            ['title' => 'Вес'],
        ]);
    }
}
