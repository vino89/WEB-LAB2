<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;      

class DebutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('debuts')->insert([
            ['text' => 'En cette journée d\'examens,'],
            ['text' => 'Après des semaines de révisions intenses,'],
            ['text' => 'Au cœur de l\'année universitaire,'],
            ['text' => 'En cette journée d\'examens,'],
            ['text' => 'Après des semaines de révisions intenses,'],
            ['text' => 'Au cœur de l\'année universitaire,'],
            ['text' => 'À la veille du grand oral,'],
            ['text' => 'Dans l\'effervescence des travaux de groupe,'],
            ['text' => 'Alors que le semestre touche à sa fin,'],
            ['text' => 'En dépit des défis académiques,'],
            ['text' => 'Pendant la période des partiels,'],
            ['text' => 'À l\'approche des soutenances de mémoire,'],
            ['text' => 'Lors de la compétition interuniversitaire,'],
            ['text' => 'À la recherche de stages,'],
            ['text' => 'Dans l\'atmosphère électrique des cours magistraux,'],
            ['text' => 'En pleine période de choix d\'orientation,'],
            ['text' => 'Alors que les vacances se terminent,'],
            ['text' => 'Au début du semestre chargé,'],
            ['text' => 'Dans l\'excitation de la rentrée universitaire,'],
            ['text' => 'À l\'heure des inscriptions aux cours,'],
            ['text' => 'Pendant le rush vers la bibliothèque,'],
            ['text' => 'Au moment des présentations de projets,'],
            ['text' => 'En préparation des examens finaux,'],
        ]);
    }
}
