<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB; // Импортируйте фасад DB для работы с базой данных

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('options')->insert([
            ['title' => 'Royal Canin'],
            ['title' => 'Hills Science Plan Optimal'],
            ['title' => 'Pro Plan Original Adult'],
            ['title' => 'Farmina N&D Low Grain'],
            ['title' => 'Acana Regionals Pacifica'],
            ['title' => 'Brit Care Cat Lucky'],
            ['title' => 'Flatazor Crocktail Adult'],
            ['title' => 'Для самых маленьких'],
            ['title' => 'Для взрослых'],
            ['title' => 'Для пожилых'],
            ['title' => 'Маленький'],
            ['title' => 'Средний'],
            ['title' => 'Крупный'],
            ['title' => 'Все размеры'],
            ['title' => 'Сухой'],
            ['title' => 'Влажный'],
            ['title' => 'Лечебный'],
            ['title' => 'Гипоаллергенный'],
            ['title' => 'Лакомство'],
            ['title' => 'Дрессировка'],
            ['title' => 'Защита рта и зубов'],
            ['title' => 'Кожа и шерсть'],
            ['title' => 'Декоративный'],
            ['title' => 'Дрессировка'],
            ['title' => 'Повседневные'],
            ['title' => 'Мягкие'],
            ['title' => 'Кожаные'],
            ['title' => 'Металлические'],
            ['title' => 'Для зубов'],
            ['title' => 'Для шерсти'],
            ['title' => 'Для лап'],
            ['title' => 'Для ушей'],
        ]);
    }
}