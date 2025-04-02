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
            'icon' => '/путь/до/icons/korm.webp',
            'image' => '/путь/до/img/korm.webp',
        ]);

        Section::create([
            'title' => 'Добавки',
            'icon' => '/путь/до/icons/dobavki.webp',
            'image' => '/путь/до/img/dobavki.webp',
        ]);

        Section::create([
            'title' => 'Игрушки',
            'icon' => '/путь/до/icons/igrushki.webp',
            'image' => '/путь/до/img/igrushki.webp',
        ]);

        Section::create([
            'title' => 'Домики',
            'icon' => '/путь/до/icons/domiki.webp',
            'image' => '/путь/до/img/domiki.webp',
        ]);

        Section::create([
            'title' => 'Амуниция',
            'icon' => '/путь/до/icons/amuniciya.webp',
            'image' => '/путь/до/img/amuniciya.webp',
        ]);

        Section::create([
            'title' => 'Уход',
            'icon' => '/путь/до/icons/uhod.webp',
            'image' => '/путь/до/img/uhod.webp',
        ]);
    }
}