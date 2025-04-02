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

        ]);

    }
}

