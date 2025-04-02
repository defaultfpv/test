<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ImagesSeeder extends Seeder
{

    public function run(): void
    {
        $faker = Faker::create();

        $numberOfRecords = 750; // Количество записей

        for ($i = 0; $i < $numberOfRecords; $i++) {
            DB::table('images')->insert([
                'path' => '/путь/до/картинки/' . $i . '.webp',
            ]);
        }
    }
}
