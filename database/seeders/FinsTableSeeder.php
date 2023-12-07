<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fins')->insert([
            ['text' => 'et c\'est ainsi que le test est surmonté avec succès.'],
            ['text' => 'la difficulté n\'empêche pas la détermination, et la réussite est au rendez-vous.'],
            ['text' => 'malgré les obstacles, une nouvelle leçon de vie est apprise.'],
            ['text' => 'les étudiants font preuve d\'une incroyable solidarité et relèvent le défi ensemble.'],
            ['text' => 'cette épreuve renforce la cohésion au sein de la classe.'],
            ['text' => 'les résultats tombent, et les attentes sont dépassées.'],
            ['text' => 'une leçon d\'humilité qui marque les esprits.'],
            ['text' => 'malgré les circonstances.']
        ]);
    }
}
