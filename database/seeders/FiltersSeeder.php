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
            ['title' => 'Цена, ₽'],
            ['title' => 'Марка'],
            ['title' => 'Возраст'],
            ['title' => 'Размер питомц'],
            ['title' => 'Тип корма'],
            ['title' => 'Тип добавки'],
            ['title' => 'Назначение товара'],
            ['title' => 'Назначение товара'],
        ]);

    }
}

