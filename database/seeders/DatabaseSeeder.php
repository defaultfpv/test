<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\SectionsSeeder;
use Database\Seeders\PetsSeeder;
use Database\Seeders\FiltersSeeder;
use Database\Seeders\SectionsFiltersSeeder;
use Database\Seeders\SectionsPetsSeeder;
use Database\Seeders\OptionsSeeder;
use Database\Seeders\FiltersOptionsSeeder;
use Database\Seeders\ProductsSeeder;
use Database\Seeders\ImagesSeeder;
use Database\Seeders\ImagesProductsSeeder;
use Database\Seeders\ProductsOptionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersSeeder::class);
        $this->call(SectionsSeeder::class);
        $this->call(PetsSeeder::class);
        $this->call(FiltersSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(SectionsPetsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ImagesProductsSeeder::class);
        $this->call(SectionsFiltersSeeder::class);
        $this->call(OptionsSeeder::class);
        $this->call(FiltersOptionsSeeder::class);
        $this->call(ProductsOptionsSeeder::class);
    }
}
