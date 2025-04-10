<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Начальник',
                'last_name' => 'Магазина',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin000'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Дмитрий',
                'last_name' => 'Гагауз',
                'email' => '0@example.com',
                'password' => Hash::make('123123123'),
                'role' => 'manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Марина',
                'last_name' => 'Морозова',
                'email' => '1@example.com',
                'password' => Hash::make('123123123'),
                'role' => 'manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Лев',
                'last_name' => 'Бабченко',
                'email' => '2@example.com',
                'password' => Hash::make('123123123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Егай',
                'last_name' => 'Зиновьев',
                'email' => '3@example.com',
                'password' => Hash::make('123123123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Наталья',
                'last_name' => 'Некрасовкая',
                'email' => '4@example.com',
                'password' => Hash::make('123123123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Михаил',
                'last_name' => 'Навлинский',
                'email' => '5@example.com',
                'password' => Hash::make('123123123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);

    }
}

