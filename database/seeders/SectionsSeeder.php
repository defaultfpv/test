<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'title' => 'Корм',
            'icon' => 'images/i-korm.png',
            'image' => 'images/korm.png',
        ]);

        Section::create([
            'title' => 'Добавки',
            'icon' => 'images/i-dobavki.png',
            'image' => 'images/dobavki.png',
        ]);

        Section::create([
            'title' => 'Игрушки',
            'icon' => 'images/i-igruwki.png',
            'image' => 'images/igruwki.png',
        ]);

        Section::create([
            'title' => 'Домики',
            'icon' => 'images/i-domiki.png',
            'image' => 'images/domiki.png',
        ]);

        Section::create([
            'title' => 'Амуниция',
            'icon' => 'images/i-amunicaiya.png',
            'image' => 'images/amunicaiya.png',
        ]);

        Section::create([
            'title' => 'Уход',
            'icon' => 'images/i-uhod.png',
            'image' => 'images/uhod.png',
        ]);
    }
}