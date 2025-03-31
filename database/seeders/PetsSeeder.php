<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pets;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pets::create([
            'code' => '001',
            'title' => 'Собаки',
        ]);

        Pets::create([
            'code' => '002',
            'title' => 'Кошки',
        ]);

        Pets::create([
            'code' => '003',
            'title' => 'Пернатые',
        ]);

        Pets::create([
            'code' => '004',
            'title' => 'Грызуны',
        ]);

        Pets::create([
            'code' => '005',
            'title' => 'Рыбки',
        ]);

    }
}
