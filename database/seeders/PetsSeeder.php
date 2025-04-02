<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pet;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pet::create([
            'title' => 'Собаки',
            'image' => '/путь/до/img/sobaki.webp',
        ]);

        Pet::create([
            'title' => 'Кошки',
            'image' => '/путь/до/img/koshki.webp',
        ]);

        Pet::create([
            'title' => 'Пернатые',
            'image' => '/путь/до/img/pernatie.webp',
        ]);

        Pet::create([
            'title' => 'Грызуны',
            'image' => '/путь/до/img/spinogrizi.webp',
        ]);

        Pet::create([
            'title' => 'Рыбки',
            'image' => '/путь/до/img/ribki.webp',
        ]);

    }
}
