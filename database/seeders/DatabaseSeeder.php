<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\CatalogSeeder;
use Database\Seeders\PetsSeeder;
use Database\Seeders\FiltersSeeder;
use Database\Seeders\CatalogFiltersSeeder;
use Database\Seeders\PetsCatalogSeeder;
use Database\Seeders\OptionsSeeder;
use Database\Seeders\FiltersOptionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создание тестового пользователя
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(CatalogSeeder::class);
        $this->call(PetsSeeder::class);
        $this->call(FiltersSeeder::class);
        $this->call(CatalogFiltersSeeder::class);
        $this->call(PetsCatalogSeeder::class);
        $this->call(OptionsSeeder::class);
        $this->call(FiltersOptionsSeeder::class);

    }
}
