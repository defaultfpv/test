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
            ['title' => 'Royal Canin', 'value' => 'royal_canin'],
            ['title' => 'Hills Science Plan Optimal', 'value' => 'hills_science_plan_optimal'],
            ['title' => 'Pro Plan Original Adult', 'value' => 'pro_plan_original_adult'],
            ['title' => 'Farmina N&D Low Grain', 'value' => 'farmina_low_grain'],
            ['title' => 'Acana Regionals Pacifica', 'value' => 'acana_regionals_pacifica'],
            ['title' => 'Brit Care Cat Lucky', 'value' => 'brit_care_cat_lucky'],
            ['title' => 'Flatazor Crocktail Adult', 'value' => 'flatazor_crocktail_adult'],
            ['title' => 'Для самых маленьких', 'value' => 'dlya_samih_malenkih'],
            ['title' => 'Для взрослых', 'value' => 'dlya_vzroslih'],
            ['title' => 'Для пожилых', 'value' => 'dlya_pojilih'],
            ['title' => 'Маленький', 'value' => 'malenkiy'],
            ['title' => 'Средний', 'value' => 'sredniy'],
            ['title' => 'Крупный', 'value' => 'krupniy'],
            ['title' => 'Все размеры', 'value' => 'vse_razmeri'],
            ['title' => 'Сухой', 'value' => 'suhoy'],
            ['title' => 'Влажный', 'value' => 'vlajniy'],
            ['title' => 'Лечебный', 'value' => 'lechebniy'],
            ['title' => 'Гипоаллергенный', 'value' => 'gipoallergenniy'],
            ['title' => 'Лакомство', 'value' => 'lakomstvo'],
            ['title' => 'Дрессировка', 'value' => 'dressirovka'],
            ['title' => 'Защита рта и зубов', 'value' => 'zashita_rta_i_zubov'],
            ['title' => 'Кожа и шерсть', 'value' => 'koja_i_sherst'],
            ['title' => 'Декоративный', 'value' => 'dekorativniy'],
            ['title' => 'Дрессировка', 'value' => 'dressirovka2'],
            ['title' => 'Повседневные', 'value' => 'povsednevnie'],
            ['title' => 'Мягкие', 'value' => 'myagkie'],
            ['title' => 'Кожаные', 'value' => 'kojannie'],
            ['title' => 'Металлические', 'value' => 'metallicheskie'],
            ['title' => 'Для зубов', 'value' => 'dlya_zubov'],
            ['title' => 'Для шерсти', 'value' => 'dlya_shersti'],
            ['title' => 'Для лап', 'value' => 'dlya_lap'],
            ['title' => 'Для ушей', 'value' => 'dlya_ushey'],
        ]);
    }
}