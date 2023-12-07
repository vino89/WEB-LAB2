<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MilieuxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('milieux')->insert([
            ['text' => 'un professeur inattendu arrive en retard,'],
            ['text' => 'le sujet de l\'examen est beaucoup plus difficile que prévu,'],
            ['text' => 'une panne de courant perturbe la salle d\'examens,'],
            ['text' => 'les étudiants découvrent une erreur dans le sujet,'],
            ['text' => 'la bibliothèque est exceptionnellement fermée,'],
            ['text' => 'une grève des transports complique le trajet jusqu\'à l\'université,'],
            ['text' => 'la cafétéria est fermée pour travaux,'],
            ['text' => 'le tableau interactif en plein dysfonctionnement,'],
            ['text' => 'un délai imprévu dans la correction des copies,'],
            ['text' => 'un invité surprise donne une conférence dans l\'amphi,'],
            ['text' => 'un exercice imprévu mais instructif,'],
            ['text' => 'une discussion animée en cours dévie sur des sujets inattendus,'],
            ['text' => 'la salle d\'étude préférée est occupée,'],
            ['text' => 'une visite imprévue du doyen,'],
            ['text' => 'le manque de places dans l\'amphi crée un chaos,'],
            ['text' => 'un orage soudain provoque une coupure de courant,'],
            ['text' => 'la machine à café de la salle des professeurs en panne,'],
            ['text' => 'une alerte incendie interrompt la séance,'],
            ['text' => 'une proposition de projet inattendue,'],
            ['text' => 'la bibliothèque est inondée après une tempête,']
        ]);
   }
}
