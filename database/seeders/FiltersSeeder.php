<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('filters')->insert([
            ['title' => 'Цена, ₽', 'key1' => 'min_price', 'key2' => 'max_price'],
            ['title' => 'Марка', 'key1' => 'maker', 'key2' => ''],
            ['title' => 'Возраст', 'key1' => 'age', 'key2' => ''],
            ['title' => 'Размер питомца', 'key1' => 'size', 'key2' => ''],
            ['title' => 'Тип корма', 'key1' => 'type_feel', 'key2' => ''],
            ['title' => 'Тип добавки', 'key1' => 'type_additive', 'key2' => ''],
            ['title' => 'Назначение товара', 'key1' => 'purpose', 'key2' => ''],
            ['title' => 'Назначение товара', 'key1' => 'purpose2', 'key2' => ''],
        ]);
    }
}

