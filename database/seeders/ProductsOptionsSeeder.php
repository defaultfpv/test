<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsOptionsSeeder extends Seeder
{
    public function run()
    {

        DB::table('products_options')->insert([
// корм собаки
            ['product_id' => 1, 'option_id' => 1],
            ['product_id' => 1, 'option_id' => 68],
            ['product_id' => 1, 'option_id' => 77],
            ['product_id' => 1, 'option_id' => 79],
            ['product_id' => 2, 'option_id' => 2],
            ['product_id' => 2, 'option_id' => 68],
            ['product_id' => 2, 'option_id' => 77],
            ['product_id' => 2, 'option_id' => 81],
            ['product_id' => 3, 'option_id' => 3],
            ['product_id' => 3, 'option_id' => 69],
            ['product_id' => 3, 'option_id' => 77],
            ['product_id' => 3, 'option_id' => 79],
            ['product_id' => 4, 'option_id' => 4],
            ['product_id' => 4, 'option_id' => 69],
            ['product_id' => 4, 'option_id' => 76],
            ['product_id' => 4, 'option_id' => 80],
            ['product_id' => 5, 'option_id' => 5],
            ['product_id' => 5, 'option_id' => 70],
            ['product_id' => 5, 'option_id' => 78],
            ['product_id' => 5, 'option_id' => 82],
            ['product_id' => 6, 'option_id' => 4],
            ['product_id' => 6, 'option_id' => 70],
            ['product_id' => 6, 'option_id' => 77],
            ['product_id' => 6, 'option_id' => 79],
            ['product_id' => 7, 'option_id' => 6],
            ['product_id' => 7, 'option_id' => 71],
            ['product_id' => 7, 'option_id' => 78],
            ['product_id' => 7, 'option_id' => 82],
// корм кошки
            ['product_id' => 8, 'option_id' => 7],
            ['product_id' => 8, 'option_id' => 68],
            ['product_id' => 8, 'option_id' => 77],
            ['product_id' => 8, 'option_id' => 81],
            ['product_id' => 9, 'option_id' => 1],
            ['product_id' => 9, 'option_id' => 68],
            ['product_id' => 9, 'option_id' => 78],
            ['product_id' => 9, 'option_id' => 82],
            ['product_id' => 10, 'option_id' => 8],
            ['product_id' => 10, 'option_id' => 68],
            ['product_id' => 10, 'option_id' => 76],
            ['product_id' => 10, 'option_id' => 80],
            ['product_id' => 11, 'option_id' => 6],
            ['product_id' => 11, 'option_id' => 69],
            ['product_id' => 11, 'option_id' => 76],
            ['product_id' => 11, 'option_id' => 80],
            ['product_id' => 12, 'option_id' => 4],
            ['product_id' => 12, 'option_id' => 69],
            ['product_id' => 12, 'option_id' => 77],
            ['product_id' => 12, 'option_id' => 81],
            ['product_id' => 13, 'option_id' => 9],
            ['product_id' => 13, 'option_id' => 69],
            ['product_id' => 13, 'option_id' => 78],
            ['product_id' => 13, 'option_id' => 81],
            ['product_id' => 14, 'option_id' => 10],
            ['product_id' => 14, 'option_id' => 69],
            ['product_id' => 14, 'option_id' => 77],
            ['product_id' => 14, 'option_id' => 81],
            ['product_id' => 15, 'option_id' => 1],
            ['product_id' => 15, 'option_id' => 70],
            ['product_id' => 15, 'option_id' => 77],
            ['product_id' => 15, 'option_id' => 82],
            ['product_id' => 16, 'option_id' => 4],
            ['product_id' => 16, 'option_id' => 70],
            ['product_id' => 16, 'option_id' => 77],
            ['product_id' => 16, 'option_id' => 79],
            ['product_id' => 17, 'option_id' => 4],
            ['product_id' => 17, 'option_id' => 71],
            ['product_id' => 17, 'option_id' => 77],
            ['product_id' => 17, 'option_id' => 81],
            ['product_id' => 18, 'option_id' => 5],
            ['product_id' => 18, 'option_id' => 71],
            ['product_id' => 18, 'option_id' => 76],
            ['product_id' => 18, 'option_id' => 79],
// корм пернатые
            ['product_id' => 19, 'option_id' => 11],
            ['product_id' => 19, 'option_id' => 68],
            ['product_id' => 19, 'option_id' => 77],
            ['product_id' => 19, 'option_id' => 82],
            ['product_id' => 20, 'option_id' => 12],
            ['product_id' => 20, 'option_id' => 68],
            ['product_id' => 20, 'option_id' => 77],
            ['product_id' => 20, 'option_id' => 82],
            ['product_id' => 21, 'option_id' => 12],
            ['product_id' => 21, 'option_id' => 68],
            ['product_id' => 21, 'option_id' => 77],
            ['product_id' => 21, 'option_id' => 81],
            ['product_id' => 22, 'option_id' => 12],
            ['product_id' => 22, 'option_id' => 68],
            ['product_id' => 22, 'option_id' => 77],
            ['product_id' => 22, 'option_id' => 81],
            ['product_id' => 23, 'option_id' => 11],
            ['product_id' => 23, 'option_id' => 68],
            ['product_id' => 23, 'option_id' => 77],
            ['product_id' => 23, 'option_id' => 80],
            ['product_id' => 24, 'option_id' => 13],
            ['product_id' => 24, 'option_id' => 68],
            ['product_id' => 24, 'option_id' => 77],
            ['product_id' => 24, 'option_id' => 80],
            ['product_id' => 25, 'option_id' => 11],
            ['product_id' => 25, 'option_id' => 71],
            ['product_id' => 25, 'option_id' => 77],
            ['product_id' => 25, 'option_id' => 81],
            ['product_id' => 26, 'option_id' => 13],
            ['product_id' => 26, 'option_id' => 71],
            ['product_id' => 26, 'option_id' => 77],
            ['product_id' => 26, 'option_id' => 80],
            ['product_id' => 27, 'option_id' => 11],
            ['product_id' => 27, 'option_id' => 71],
            ['product_id' => 27, 'option_id' => 77],
            ['product_id' => 27, 'option_id' => 80],
// корм грызуны
            ['product_id' => 28, 'option_id' => 12],
            ['product_id' => 28, 'option_id' => 68],
            ['product_id' => 28, 'option_id' => 76],
            ['product_id' => 28, 'option_id' => 80],
            ['product_id' => 29, 'option_id' => 14],
            ['product_id' => 29, 'option_id' => 68],
            ['product_id' => 29, 'option_id' => 76],
            ['product_id' => 29, 'option_id' => 80],
            ['product_id' => 30, 'option_id' => 12],
            ['product_id' => 30, 'option_id' => 68],
            ['product_id' => 30, 'option_id' => 77],
            ['product_id' => 30, 'option_id' => 81],
            ['product_id' => 31, 'option_id' => 12],
            ['product_id' => 31, 'option_id' => 68],
            ['product_id' => 31, 'option_id' => 77],
            ['product_id' => 31, 'option_id' => 81],
            ['product_id' => 32, 'option_id' => 15],
            ['product_id' => 32, 'option_id' => 68],
            ['product_id' => 32, 'option_id' => 77],
            ['product_id' => 32, 'option_id' => 81],
            ['product_id' => 33, 'option_id' => 13],
            ['product_id' => 33, 'option_id' => 68],
            ['product_id' => 33, 'option_id' => 77],
            ['product_id' => 33, 'option_id' => 82],
// корм рыбы
            ['product_id' => 34, 'option_id' => 16],
            ['product_id' => 34, 'option_id' => 68],
            ['product_id' => 34, 'option_id' => 76],
            ['product_id' => 34, 'option_id' => 80],
            ['product_id' => 35, 'option_id' => 17],
            ['product_id' => 35, 'option_id' => 68],
            ['product_id' => 35, 'option_id' => 77],
            ['product_id' => 35, 'option_id' => 79],
            ['product_id' => 36, 'option_id' => 16],
            ['product_id' => 36, 'option_id' => 68],
            ['product_id' => 36, 'option_id' => 77],
            ['product_id' => 36, 'option_id' => 79],
            ['product_id' => 37, 'option_id' => 16],
            ['product_id' => 37, 'option_id' => 68],
            ['product_id' => 37, 'option_id' => 77],
            ['product_id' => 37, 'option_id' => 79],

// добавки собаки
            ['product_id' => 38, 'option_id' => 18],
            ['product_id' => 38, 'option_id' => 72],
            ['product_id' => 38, 'option_id' => 76],
            ['product_id' => 38, 'option_id' => 80],
            ['product_id' => 39, 'option_id' => 19],
            ['product_id' => 39, 'option_id' => 72],
            ['product_id' => 39, 'option_id' => 76],
            ['product_id' => 39, 'option_id' => 80],
            ['product_id' => 40, 'option_id' => 20],
            ['product_id' => 40, 'option_id' => 72],
            ['product_id' => 40, 'option_id' => 77],
            ['product_id' => 40, 'option_id' => 81],
            ['product_id' => 41, 'option_id' => 18],
            ['product_id' => 41, 'option_id' => 72],
            ['product_id' => 41, 'option_id' => 77],
            ['product_id' => 41, 'option_id' => 80],
            ['product_id' => 42, 'option_id' => 18],
            ['product_id' => 42, 'option_id' => 72],
            ['product_id' => 42, 'option_id' => 77],
            ['product_id' => 42, 'option_id' => 79],
            ['product_id' => 43, 'option_id' => 21],
            ['product_id' => 43, 'option_id' => 71],
            ['product_id' => 43, 'option_id' => 77],
            ['product_id' => 43, 'option_id' => 79],
            ['product_id' => 44, 'option_id' => 18],
            ['product_id' => 44, 'option_id' => 71],
            ['product_id' => 44, 'option_id' => 77],
            ['product_id' => 44, 'option_id' => 80],
            ['product_id' => 45, 'option_id' => 22],
            ['product_id' => 45, 'option_id' => 74],
            ['product_id' => 45, 'option_id' => 77],
            ['product_id' => 45, 'option_id' => 80],
            ['product_id' => 46, 'option_id' => 18],
            ['product_id' => 46, 'option_id' => 74],
            ['product_id' => 46, 'option_id' => 77],
            ['product_id' => 46, 'option_id' => 81],
            ['product_id' => 47, 'option_id' => 18],
            ['product_id' => 47, 'option_id' => 74],
            ['product_id' => 47, 'option_id' => 77],
            ['product_id' => 47, 'option_id' => 82],
// добавки для кошек
            ['product_id' => 48, 'option_id' => 21],
            ['product_id' => 48, 'option_id' => 74],
            ['product_id' => 48, 'option_id' => 77],
            ['product_id' => 48, 'option_id' => 82],
            ['product_id' => 49, 'option_id' => 18],
            ['product_id' => 49, 'option_id' => 74],
            ['product_id' => 49, 'option_id' => 77],
            ['product_id' => 49, 'option_id' => 81],
            ['product_id' => 50, 'option_id' => 23],
            ['product_id' => 50, 'option_id' => 75],
            ['product_id' => 50, 'option_id' => 77],
            ['product_id' => 50, 'option_id' => 81],
            ['product_id' => 51, 'option_id' => 24],
            ['product_id' => 51, 'option_id' => 75],
            ['product_id' => 51, 'option_id' => 77],
            ['product_id' => 51, 'option_id' => 81],
            ['product_id' => 52, 'option_id' => 25],
            ['product_id' => 52, 'option_id' => 76],
            ['product_id' => 52, 'option_id' => 77],
            ['product_id' => 52, 'option_id' => 82],
            ['product_id' => 53, 'option_id' => 26],
            ['product_id' => 53, 'option_id' => 76],
            ['product_id' => 53, 'option_id' => 77],
            ['product_id' => 53, 'option_id' => 81],
            ['product_id' => 54, 'option_id' => 25],
            ['product_id' => 54, 'option_id' => 77],
            ['product_id' => 54, 'option_id' => 77],
            ['product_id' => 54, 'option_id' => 82],
            ['product_id' => 55, 'option_id' => 26],
            ['product_id' => 55, 'option_id' => 77],
            ['product_id' => 55, 'option_id' => 77],
            ['product_id' => 55, 'option_id' => 81],
// добавки для пернатых
            ['product_id' => 56, 'option_id' => 29],
            ['product_id' => 56, 'option_id' => 74],
            ['product_id' => 56, 'option_id' => 77],
            ['product_id' => 56, 'option_id' => 79],
            ['product_id' => 57, 'option_id' => 29],
            ['product_id' => 57, 'option_id' => 74],
            ['product_id' => 57, 'option_id' => 77],
            ['product_id' => 57, 'option_id' => 81],
            ['product_id' => 58, 'option_id' => 29],
            ['product_id' => 58, 'option_id' => 74],
            ['product_id' => 58, 'option_id' => 77],
            ['product_id' => 58, 'option_id' => 80],
// добавки для грызунов
            ['product_id' => 59, 'option_id' => 27],
            ['product_id' => 59, 'option_id' => 77],
            ['product_id' => 59, 'option_id' => 77],
            ['product_id' => 59, 'option_id' => 81],
            ['product_id' => 60, 'option_id' => 28],
            ['product_id' => 60, 'option_id' => 74],
            ['product_id' => 60, 'option_id' => 77],
            ['product_id' => 60, 'option_id' => 80],
            ['product_id' => 61, 'option_id' => 30],
            ['product_id' => 61, 'option_id' => 74],
            ['product_id' => 61, 'option_id' => 77],
            ['product_id' => 61, 'option_id' => 79],

// игрушки собаки
            ['product_id' => 62, 'option_id' => 31],
            ['product_id' => 62, 'option_id' => 77],
            ['product_id' => 62, 'option_id' => 81],
            ['product_id' => 63, 'option_id' => 32],
            ['product_id' => 63, 'option_id' => 77],
            ['product_id' => 63, 'option_id' => 80],
            ['product_id' => 64, 'option_id' => 33],
            ['product_id' => 64, 'option_id' => 77],
            ['product_id' => 64, 'option_id' => 82],
            ['product_id' => 65, 'option_id' => 31],
            ['product_id' => 65, 'option_id' => 76],
            ['product_id' => 65, 'option_id' => 80],
            ['product_id' => 66, 'option_id' => 31],
            ['product_id' => 66, 'option_id' => 77],
            ['product_id' => 66, 'option_id' => 80],
// игрушки кошки
            ['product_id' => 67, 'option_id' => 32],
            ['product_id' => 67, 'option_id' => 77],
            ['product_id' => 67, 'option_id' => 81],
            ['product_id' => 68, 'option_id' => 32],
            ['product_id' => 68, 'option_id' => 76],
            ['product_id' => 68, 'option_id' => 79],
            ['product_id' => 69, 'option_id' => 33],
            ['product_id' => 69, 'option_id' => 76],
            ['product_id' => 69, 'option_id' => 80],
            ['product_id' => 70, 'option_id' => 31],
            ['product_id' => 70, 'option_id' => 77],
            ['product_id' => 70, 'option_id' => 82],
// игрушки для пернатых
            ['product_id' => 71, 'option_id' => 33],
            ['product_id' => 71, 'option_id' => 77],
            ['product_id' => 71, 'option_id' => 81],
            ['product_id' => 72, 'option_id' => 34],
            ['product_id' => 72, 'option_id' => 77],
            ['product_id' => 72, 'option_id' => 81],
            ['product_id' => 73, 'option_id' => 34],
            ['product_id' => 73, 'option_id' => 77],
            ['product_id' => 73, 'option_id' => 80],
            ['product_id' => 74, 'option_id' => 35],
            ['product_id' => 74, 'option_id' => 77],
            ['product_id' => 74, 'option_id' => 82],
// игрушки грызуны
            ['product_id' => 75, 'option_id' => 35],
            ['product_id' => 75, 'option_id' => 77],
            ['product_id' => 75, 'option_id' => 80],
            ['product_id' => 76, 'option_id' => 36],
            ['product_id' => 76, 'option_id' => 77],
            ['product_id' => 76, 'option_id' => 81],
            ['product_id' => 77, 'option_id' => 35],
            ['product_id' => 77, 'option_id' => 77],
            ['product_id' => 77, 'option_id' => 82],

// домики для собак
            ['product_id' => 78, 'option_id' => 37],
            ['product_id' => 78, 'option_id' => 77],
            ['product_id' => 78, 'option_id' => 82],
            ['product_id' => 79, 'option_id' => 37],
            ['product_id' => 79, 'option_id' => 77],
            ['product_id' => 79, 'option_id' => 81],
            ['product_id' => 80, 'option_id' => 38],
            ['product_id' => 80, 'option_id' => 77],
            ['product_id' => 80, 'option_id' => 80],
            ['product_id' => 81, 'option_id' => 39],
            ['product_id' => 81, 'option_id' => 77],
            ['product_id' => 81, 'option_id' => 82],
// домики для кошек
            ['product_id' => 82, 'option_id' => 38],
            ['product_id' => 82, 'option_id' => 77],
            ['product_id' => 82, 'option_id' => 81],
            ['product_id' => 83, 'option_id' => 37],
            ['product_id' => 83, 'option_id' => 77],
            ['product_id' => 83, 'option_id' => 81],
            ['product_id' => 84, 'option_id' => 37],
            ['product_id' => 84, 'option_id' => 77],
            ['product_id' => 84, 'option_id' => 82],
            ['product_id' => 85, 'option_id' => 37],
            ['product_id' => 85, 'option_id' => 77],
            ['product_id' => 85, 'option_id' => 80],
// домики для пернатых
            ['product_id' => 86, 'option_id' => 39],
            ['product_id' => 86, 'option_id' => 77],
            ['product_id' => 86, 'option_id' => 80],
            ['product_id' => 87, 'option_id' => 39],
            ['product_id' => 87, 'option_id' => 77],
            ['product_id' => 87, 'option_id' => 81],
            ['product_id' => 88, 'option_id' => 40],
            ['product_id' => 88, 'option_id' => 77],
            ['product_id' => 88, 'option_id' => 82],
// домики для грызунов
            ['product_id' => 89, 'option_id' => 39],
            ['product_id' => 89, 'option_id' => 77],
            ['product_id' => 89, 'option_id' => 81],
            ['product_id' => 90, 'option_id' => 41],
            ['product_id' => 90, 'option_id' => 77],
            ['product_id' => 90, 'option_id' => 81],
            ['product_id' => 91, 'option_id' => 41],
            ['product_id' => 91, 'option_id' => 77],
            ['product_id' => 91, 'option_id' => 82],
// домики для рыб
            ['product_id' => 92, 'option_id' => 42],
            ['product_id' => 92, 'option_id' => 77],
            ['product_id' => 92, 'option_id' => 82],
            ['product_id' => 93, 'option_id' => 43],
            ['product_id' => 93, 'option_id' => 77],
            ['product_id' => 93, 'option_id' => 81],
            ['product_id' => 94, 'option_id' => 44],
            ['product_id' => 94, 'option_id' => 77],
            ['product_id' => 94, 'option_id' => 80],

// амуниция собаки
            ['product_id' => 95, 'option_id' => 45],
            ['product_id' => 95, 'option_id' => 76],
            ['product_id' => 95, 'option_id' => 80],
            ['product_id' => 95, 'option_id' => 83],
            ['product_id' => 96, 'option_id' => 46],
            ['product_id' => 96, 'option_id' => 77],
            ['product_id' => 96, 'option_id' => 79],
            ['product_id' => 96, 'option_id' => 83],
            ['product_id' => 97, 'option_id' => 46],
            ['product_id' => 97, 'option_id' => 77],
            ['product_id' => 97, 'option_id' => 82],
            ['product_id' => 97, 'option_id' => 83],
            ['product_id' => 98, 'option_id' => 47],
            ['product_id' => 98, 'option_id' => 77],
            ['product_id' => 98, 'option_id' => 80],
            ['product_id' => 98, 'option_id' => 84],
            ['product_id' => 99, 'option_id' => 48],
            ['product_id' => 99, 'option_id' => 77],
            ['product_id' => 99, 'option_id' => 81],
            ['product_id' => 99, 'option_id' => 84],
            ['product_id' => 100, 'option_id' => 46],
            ['product_id' => 100, 'option_id' => 77],
            ['product_id' => 100, 'option_id' => 81],
            ['product_id' => 100, 'option_id' => 85],
            ['product_id' => 101, 'option_id' => 47],
            ['product_id' => 101, 'option_id' => 77],
            ['product_id' => 101, 'option_id' => 80],
            ['product_id' => 101, 'option_id' => 85],
            ['product_id' => 102, 'option_id' => 49],
            ['product_id' => 102, 'option_id' => 77],
            ['product_id' => 102, 'option_id' => 80],
            ['product_id' => 102, 'option_id' => 86],
            ['product_id' => 103, 'option_id' => 49],
            ['product_id' => 103, 'option_id' => 77],
            ['product_id' => 103, 'option_id' => 81],
            ['product_id' => 103, 'option_id' => 86],
            ['product_id' => 104, 'option_id' => 50],
            ['product_id' => 104, 'option_id' => 77],
            ['product_id' => 104, 'option_id' => 82],
            ['product_id' => 104, 'option_id' => 87],
            ['product_id' => 105, 'option_id' => 50],
            ['product_id' => 105, 'option_id' => 77],
            ['product_id' => 105, 'option_id' => 81],
            ['product_id' => 105, 'option_id' => 87],
            ['product_id' => 106, 'option_id' => 51],
            ['product_id' => 106, 'option_id' => 77],
            ['product_id' => 106, 'option_id' => 82],
            ['product_id' => 106, 'option_id' => 88],
            ['product_id' => 107, 'option_id' => 52],
            ['product_id' => 107, 'option_id' => 77],
            ['product_id' => 107, 'option_id' => 82],
            ['product_id' => 107, 'option_id' => 88],
// амуниция кошки
            ['product_id' => 108, 'option_id' => 52],
            ['product_id' => 108, 'option_id' => 77],
            ['product_id' => 108, 'option_id' => 81],
            ['product_id' => 108, 'option_id' => 85],
            ['product_id' => 109, 'option_id' => 53],
            ['product_id' => 109, 'option_id' => 77],
            ['product_id' => 109, 'option_id' => 81],
            ['product_id' => 109, 'option_id' => 85],
            ['product_id' => 110, 'option_id' => 47],
            ['product_id' => 110, 'option_id' => 77],
            ['product_id' => 110, 'option_id' => 81],
            ['product_id' => 110, 'option_id' => 85],
            ['product_id' => 111, 'option_id' => 46],
            ['product_id' => 111, 'option_id' => 77],
            ['product_id' => 111, 'option_id' => 80],
            ['product_id' => 111, 'option_id' => 85],

// уход собаки
            ['product_id' => 112, 'option_id' => 54],
            ['product_id' => 112, 'option_id' => 77],
            ['product_id' => 112, 'option_id' => 79],
            ['product_id' => 112, 'option_id' => 89],
            ['product_id' => 113, 'option_id' => 55],
            ['product_id' => 113, 'option_id' => 77],
            ['product_id' => 113, 'option_id' => 79],
            ['product_id' => 113, 'option_id' => 89],
            ['product_id' => 114, 'option_id' => 56],
            ['product_id' => 114, 'option_id' => 77],
            ['product_id' => 114, 'option_id' => 79],
            ['product_id' => 114, 'option_id' => 90],
            ['product_id' => 115, 'option_id' => 57],
            ['product_id' => 115, 'option_id' => 76],
            ['product_id' => 115, 'option_id' => 80],
            ['product_id' => 115, 'option_id' => 90],
            ['product_id' => 116, 'option_id' => 58],
            ['product_id' => 116, 'option_id' => 77],
            ['product_id' => 116, 'option_id' => 79],
            ['product_id' => 116, 'option_id' => 91],
            ['product_id' => 117, 'option_id' => 59],
            ['product_id' => 117, 'option_id' => 77],
            ['product_id' => 117, 'option_id' => 81],
            ['product_id' => 117, 'option_id' => 91],
            ['product_id' => 118, 'option_id' => 60],
            ['product_id' => 118, 'option_id' => 77],
            ['product_id' => 118, 'option_id' => 79],
            ['product_id' => 118, 'option_id' => 92],
            ['product_id' => 119, 'option_id' => 61],
            ['product_id' => 119, 'option_id' => 77],
            ['product_id' => 119, 'option_id' => 79],
            ['product_id' => 119, 'option_id' => 92],
// уход кошки
            ['product_id' => 120, 'option_id' => 62],
            ['product_id' => 120, 'option_id' => 77],
            ['product_id' => 120, 'option_id' => 79],
            ['product_id' => 120, 'option_id' => 89],
            ['product_id' => 121, 'option_id' => 63],
            ['product_id' => 121, 'option_id' => 77],
            ['product_id' => 121, 'option_id' => 79],
            ['product_id' => 121, 'option_id' => 89],
            ['product_id' => 122, 'option_id' => 64],
            ['product_id' => 122, 'option_id' => 77],
            ['product_id' => 122, 'option_id' => 79],
            ['product_id' => 122, 'option_id' => 90],
            ['product_id' => 123, 'option_id' => 65],
            ['product_id' => 123, 'option_id' => 76],
            ['product_id' => 123, 'option_id' => 80],
            ['product_id' => 123, 'option_id' => 90],
            ['product_id' => 124, 'option_id' => 66],
            ['product_id' => 124, 'option_id' => 77],
            ['product_id' => 124, 'option_id' => 79],
            ['product_id' => 124, 'option_id' => 92],
            ['product_id' => 125, 'option_id' => 67],
            ['product_id' => 125, 'option_id' => 77],
            ['product_id' => 125, 'option_id' => 79],
            ['product_id' => 125, 'option_id' => 92],
// уход грызуны
            ['product_id' => 126, 'option_id' => 60],
            ['product_id' => 126, 'option_id' => 77],
            ['product_id' => 126, 'option_id' => 79],
            ['product_id' => 126, 'option_id' => 90],
            ['product_id' => 127, 'option_id' => 61],
            ['product_id' => 127, 'option_id' => 77],
            ['product_id' => 127, 'option_id' => 79],
            ['product_id' => 127, 'option_id' => 90],

        ]);
    }
}