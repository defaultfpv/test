<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SectionsPetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Пример заполнения таблицы sections_pets
        DB::table('sections_pets')->insert([
            ['title' => 'Корм для собак', 'section_id' => 1, 'pet_id' => 1],
            ['title' => 'Корм для кошек', 'section_id' => 1, 'pet_id' => 2],
            ['title' => 'Корм для пернатых', 'section_id' => 1, 'pet_id' => 3],
            ['title' => 'Корм для грызунов', 'section_id' => 1, 'pet_id' => 4],
            ['title' => 'Корм для рыбок', 'section_id' => 1, 'pet_id' => 5],

            ['title' => 'Добавки для собак', 'section_id' => 2, 'pet_id' => 1],
            ['title' => 'Добавки для кошек', 'section_id' => 2, 'pet_id' => 2],
            ['title' => 'Добавки для пернатых', 'section_id' => 2, 'pet_id' => 3],
            ['title' => 'Добавки для грызунов', 'section_id' => 2, 'pet_id' => 4],
            ['title' => 'Добавки для рыбок', 'section_id' => 2, 'pet_id' => 5],

            ['title' => 'Игрушки для собак', 'section_id' => 3, 'pet_id' => 1],
            ['title' => 'Игрушки для кошек', 'section_id' => 3, 'pet_id' => 2],
            ['title' => 'Игрушки для пернатых', 'section_id' => 3, 'pet_id' => 3],
            ['title' => 'Игрушки для грызунов', 'section_id' => 3, 'pet_id' => 4],

            ['title' => 'Домики для собак', 'section_id' => 4, 'pet_id' => 1],
            ['title' => 'Домики для кошек', 'section_id' => 4, 'pet_id' => 2],
            ['title' => 'Домики для пернатых', 'section_id' => 4, 'pet_id' => 3],
            ['title' => 'Домики для грызунов', 'section_id' => 4, 'pet_id' => 4],
            ['title' => 'Домики для рыбок', 'section_id' => 4, 'pet_id' => 5],

            ['title' => 'Амуниция для собак', 'section_id' => 5, 'pet_id' => 1],
            ['title' => 'Амуниция для кошек', 'section_id' => 5, 'pet_id' => 2],

            ['title' => 'Уход за собаками', 'section_id' => 6, 'pet_id' => 1],
            ['title' => 'Уход за кошками', 'section_id' => 6, 'pet_id' => 2],
            ['title' => 'Уход за грызунами', 'section_id' => 6, 'pet_id' => 4],

        ]);
    }
}
