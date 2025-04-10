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
            'image' => 'images/sobaki.png',
        ]);

        Pet::create([
            'title' => 'Кошки',
            'image' => 'images/kowki.png',
        ]);

        Pet::create([
            'title' => 'Пернатые',
            'image' => 'images/pernatie.png',
        ]);

        Pet::create([
            'title' => 'Грызуны',
            'image' => 'images/grizuni.png',
        ]);

        Pet::create([
            'title' => 'Рыбки',
            'image' => 'images/ribi.png',
        ]);

    }
}
