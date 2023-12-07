<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;   

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'vic', 'sign' => 'Verseau', 'sector' => 'Sécurité'],
            ['name' => 'alec5', 'sign' => 'Bélier', 'sector' => 'Logiciel'],
            ['name' => 'pirakasos', 'sign' => 'Vierge', 'sector' => 'Sécurité'],
        ]);
    }
}
