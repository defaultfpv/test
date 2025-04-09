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
            /////////////////////////////////
            // МАРКА
            /////////////////////////////////
            // корм 17
            ['title' => 'Ownat', 'value' => 'ownat'],
            ['title' => 'Grandorf', 'value' => 'grandorf'],
            ['title' => 'АВВА', 'value' => 'abba'],
            ['title' => 'Royal Canin', 'value' => 'royal_canin'],
            ['title' => 'ALLEVA', 'value' => 'alleva'],
            ['title' => 'PRO PLAN', 'value' => 'pro_plan'],
            ['title' => 'AlphaPet', 'value' => 'alphapet'],
            ['title' => 'Mealfeel', 'value' => 'mealfeel'],
            ['title' => 'Grandin', 'value' => 'grandin'],
            ['title' => 'Crave', 'value' => 'crave'],
            ['title' => 'RIO', 'value' => 'rio'],
            ['title' => 'Padovan', 'value' => 'padovan'],
            ['title' => 'GRUMS', 'value' => 'grums'],
            ['title' => 'Little One', 'value' => 'little_one'],
            ['title' => 'Fiory', 'value' => 'fiory'],
            ['title' => 'Tetra', 'value' => 'tetra'],
            ['title' => 'Рыбята', 'value' => 'ribyata'],

            // добавки 11
            ['title' => 'Деревенские лакомства', 'value' => 'derevenskie_lakomstva'],
            ['title' => 'Chewell', 'value' => 'chewel'],
            ['title' => 'Награда', 'value' => 'nagrada'],
            ['title' => 'TiTBiT', 'value' => 'titbit'],
            ['title' => '8in1', 'value' => '8in1'],
            ['title' => 'Monge', 'value' => 'monge'],
            ['title' => 'BEST FOR FRIEND', 'value' => 'best_fo_friend'],
            ['title' => 'Murmix', 'value' => 'murmix'],
            ['title' => 'Мнямс', 'value' => 'mnyams'],
            ['title' => 'Unitabs', 'value' => 'unitabs'],
            ['title' => 'Чика', 'value' => '4ika'],
            ['title' => 'RIO', 'value' => 'rio2'],
            ['title' => 'GRUMS', 'value' => 'grums2'],

            // Игрушки 6
            ['title' => 'RURRI', 'value' => 'rurri'],
            ['title' => 'Pet hobby', 'value' => 'pet_hobby'],
            ['title' => 'Petmax', 'value' => 'petmax'],
            ['title' => 'Triol', 'value' => 'triol'],
            ['title' => 'Trixie', 'value' => 'trixie'],
            ['title' => 'M-PETS', 'value' => 'mpets'],

            // Домики 8
            ['title' => 'RURRI', 'value' => 'rurri2'],
            ['title' => 'Pet hobby', 'value' => 'pet_hobby2'],
            ['title' => 'Ferplast', 'value' => 'ferplast'],
            ['title' => 'Triol', 'value' => 'triol2'],
            ['title' => 'Монморанси', 'value' => 'monmoransi'],
            ['title' => 'Голд Фиш', 'value' => 'gold_fish'],
            ['title' => 'Авгуръ', 'value' => 'avgur'],
            ['title' => 'WATERA', 'value' => 'watera'],

            // Амуниция 9
            ['title' => 'Pet hobby', 'value' => 'pet_hobby3'],
            ['title' => 'Ferplast', 'value' => 'ferplast2'],
            ['title' => 'Аркон', 'value' => 'arkon'],
            ['title' => 'Rungo', 'value' => 'rungo'],
            ['title' => 'RURRI ', 'value' => 'rurri3'],
            ['title' => 'Каскад', 'value' => 'kaskad'],
            ['title' => 'PET LINE', 'value' => 'pet_line'],
            ['title' => 'Trixie', 'value' => 'trixie2'],
            ['title' => 'Osso', 'value' => 'osso'],

            // Уход 14
            ['title' => 'OROZYME', 'value' => 'orozyme'],
            ['title' => 'Cliny', 'value' => 'cliny'],
            ['title' => 'Iv San Bernard ', 'value' => 'iv_san_bernard'],
            ['title' => 'BIOPETACTIVE ', 'value' => 'biopetactive'],
            ['title' => 'WONDER LAB', 'value' => 'wonder_lab'],
            ['title' => 'Антицарапки', 'value' => 'antizarapki'],
            ['title' => 'Veda ', 'value' => 'veda'],
            ['title' => 'АВЗ', 'value' => 'avz'],
            ['title' => 'Cliny', 'value' => 'cliny2'],
            ['title' => 'Youshi', 'value' => 'youshi'],
            ['title' => 'МИРАЛЕК', 'value' => 'miralek'],
            ['title' => 'Ecozavr', 'value' => 'ecozavr'],
            ['title' => 'I LOVE MY PET', 'value' => 'i_love_my_pet'],
            ['title' => 'САНГРА', 'value' => 'sangra'],

            ///////////////////////////////////////////////
            // ТИП
            ///////////////////////////////////////////////

            // корм 4
            ['title' => 'Сухой', 'value' => 'suhoy'],
            ['title' => 'Влажный', 'value' => 'vlajniy'],
            ['title' => 'Гипоаллергенный', 'value' => 'gipoallergenniy'],
            ['title' => 'Лечебный', 'value' => 'lechebniy'],

            // добавки 4
            ['title' => 'Лакомство', 'value' => 'lakomstvo'],
            ['title' => 'Дрессировка', 'value' => 'dressirovka'],
            ['title' => 'Защита рта и зубов', 'value' => 'zashita_rta_i_zubov'],
            ['title' => 'Кожа и шерсть', 'value' => 'koja_i_sherst'],

            
            ///////////////////////////////////////////////
            // ВОЗРАСТ
            ///////////////////////////////////////////////

            // все категории 3
            ['title' => 'Для самых маленьких', 'value' => 'dlya_samih_malenkih'],
            ['title' => 'Для взрослых', 'value' => 'dlya_vzroslih'],
            ['title' => 'Для пожилых', 'value' => 'dlya_pojilih'],

            ///////////////////////////////////////////////
            // РАЗМЕР
            ///////////////////////////////////////////////

            // все категории 4
            ['title' => 'Все размеры', 'value' => 'vse_razmeri'],
            ['title' => 'Маленький', 'value' => 'malenkiy'],
            ['title' => 'Средний', 'value' => 'sredniy'],
            ['title' => 'Крупный', 'value' => 'krupniy'],

            ///////////////////////////////////////////////
            // НАЗНАЧЕНИЕ
            ///////////////////////////////////////////////

            // амуниция 6
            ['title' => 'Декоративный', 'value' => 'decorativniy'],
            ['title' => 'Дрессировка', 'value' => 'dressirovka2'],
            ['title' => 'Повседневные', 'value' => 'povsednevnie'],
            ['title' => 'Мягкие', 'value' => 'myagkie'],
            ['title' => 'Кожаные ', 'value' => 'kojannie'],
            ['title' => 'Металлические', 'value' => 'metallicheskie'],

            // уход 4
            ['title' => 'Для зубов', 'value' => 'dlya_zybov'],
            ['title' => 'Для шерсти', 'value' => 'dlya_shersti'],
            ['title' => 'Для лап', 'value' => 'dlya_lap'],
            ['title' => 'Для ушей', 'value' => 'dlya_ushey'],

        ]);
    }
}