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
            // марки корма
            ['filter_id' => 2, 'option_id' => 1],
            ['filter_id' => 2, 'option_id' => 2],
            ['filter_id' => 2, 'option_id' => 3],
            ['filter_id' => 2, 'option_id' => 4],
            ['filter_id' => 2, 'option_id' => 5],
            ['filter_id' => 2, 'option_id' => 6],
            ['filter_id' => 2, 'option_id' => 7],
            ['filter_id' => 2, 'option_id' => 8],
            ['filter_id' => 2, 'option_id' => 9],
            ['filter_id' => 2, 'option_id' => 10],
            ['filter_id' => 2, 'option_id' => 11],
            ['filter_id' => 2, 'option_id' => 12],
            ['filter_id' => 2, 'option_id' => 13],
            ['filter_id' => 2, 'option_id' => 14],
            ['filter_id' => 2, 'option_id' => 15],
            ['filter_id' => 2, 'option_id' => 16],
            ['filter_id' => 2, 'option_id' => 17],
            // марки добавок
            ['filter_id' => 3, 'option_id' => 18],
            ['filter_id' => 3, 'option_id' => 19],
            ['filter_id' => 3, 'option_id' => 20],
            ['filter_id' => 3, 'option_id' => 21],
            ['filter_id' => 3, 'option_id' => 22],
            ['filter_id' => 3, 'option_id' => 23],
            ['filter_id' => 3, 'option_id' => 24],
            ['filter_id' => 3, 'option_id' => 25],
            ['filter_id' => 3, 'option_id' => 26],
            ['filter_id' => 3, 'option_id' => 27],
            ['filter_id' => 3, 'option_id' => 28],
            ['filter_id' => 3, 'option_id' => 29],
            ['filter_id' => 3, 'option_id' => 30],
            // марки игрушек
            ['filter_id' => 4, 'option_id' => 31],
            ['filter_id' => 4, 'option_id' => 32],
            ['filter_id' => 4, 'option_id' => 33],
            ['filter_id' => 4, 'option_id' => 34],
            ['filter_id' => 4, 'option_id' => 35],
            ['filter_id' => 4, 'option_id' => 36],
            // марки домиков
            ['filter_id' => 5, 'option_id' => 37],
            ['filter_id' => 5, 'option_id' => 38],
            ['filter_id' => 5, 'option_id' => 39],
            ['filter_id' => 5, 'option_id' => 40],
            ['filter_id' => 5, 'option_id' => 41],
            ['filter_id' => 5, 'option_id' => 42],
            ['filter_id' => 5, 'option_id' => 43],
            ['filter_id' => 5, 'option_id' => 44],
            // марки амуниции
            ['filter_id' => 6, 'option_id' => 45],
            ['filter_id' => 6, 'option_id' => 46],
            ['filter_id' => 6, 'option_id' => 47],
            ['filter_id' => 6, 'option_id' => 48],
            ['filter_id' => 6, 'option_id' => 49],
            ['filter_id' => 6, 'option_id' => 50],
            ['filter_id' => 6, 'option_id' => 51],
            ['filter_id' => 6, 'option_id' => 52],
            ['filter_id' => 6, 'option_id' => 53],
            // марки средств по уходу
            ['filter_id' => 7, 'option_id' => 54],
            ['filter_id' => 7, 'option_id' => 55],
            ['filter_id' => 7, 'option_id' => 56],
            ['filter_id' => 7, 'option_id' => 57],
            ['filter_id' => 7, 'option_id' => 58],
            ['filter_id' => 7, 'option_id' => 59],
            ['filter_id' => 7, 'option_id' => 60],
            ['filter_id' => 7, 'option_id' => 61],
            ['filter_id' => 7, 'option_id' => 62],
            ['filter_id' => 7, 'option_id' => 63],
            ['filter_id' => 7, 'option_id' => 64],
            ['filter_id' => 7, 'option_id' => 65],
            ['filter_id' => 7, 'option_id' => 66],
            ['filter_id' => 7, 'option_id' => 67],
            
            // тип корма
            ['filter_id' => 8, 'option_id' => 68],
            ['filter_id' => 8, 'option_id' => 69],
            ['filter_id' => 8, 'option_id' => 70],
            ['filter_id' => 8, 'option_id' => 71],
            // тип добавки
            ['filter_id' => 9, 'option_id' => 72],
            ['filter_id' => 9, 'option_id' => 73],
            ['filter_id' => 9, 'option_id' => 74],
            ['filter_id' => 9, 'option_id' => 75],
            
            // Возраст\все категории
            ['filter_id' => 10, 'option_id' => 76],
            ['filter_id' => 10, 'option_id' => 77],
            ['filter_id' => 10, 'option_id' => 78],
            
            // размер\все категории
            ['filter_id' => 11, 'option_id' => 79],
            ['filter_id' => 11, 'option_id' => 80],
            ['filter_id' => 11, 'option_id' => 81],
            ['filter_id' => 11, 'option_id' => 82],
            
            // Назнчение/амуниция
            ['filter_id' => 12, 'option_id' => 83],
            ['filter_id' => 12, 'option_id' => 84],
            ['filter_id' => 12, 'option_id' => 85],
            ['filter_id' => 12, 'option_id' => 86],
            ['filter_id' => 12, 'option_id' => 87],
            ['filter_id' => 12, 'option_id' => 88],
            // уход
            ['filter_id' => 13, 'option_id' => 89],
            ['filter_id' => 13, 'option_id' => 90],
            ['filter_id' => 13, 'option_id' => 91],
            ['filter_id' => 13, 'option_id' => 92],
            
        ]);
    }
}

