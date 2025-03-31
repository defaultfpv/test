<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Catalog;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Catalog::create([
            'code' => '01',
            'title' => 'Корм',
        ]);

        Catalog::create([
            'code' => '02',
            'title' => 'Добавки',
        ]);

        Catalog::create([
            'code' => '03',
            'title' => 'Игрушки',
        ]);

        Catalog::create([
            'code' => '04',
            'title' => 'Домики',
        ]);

        Catalog::create([
            'code' => '05',
            'title' => 'Амуниция',
        ]);

        Catalog::create([
            'code' => '06',
            'title' => 'Уход',
        ]);
    }
}