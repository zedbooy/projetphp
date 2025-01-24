<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stagiaire;

class StagiaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stagiaire::insert([
            [
                'firstname' => 'Ziad',
                'lastname' => 'zedboy',
                'groupe' => 'G5',
                'juree' => 'Mr.Amine Zeguendri', 
                'rapport_path' => null,
                'confirmed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Ayoub ',
                'lastname' => 'Zawardo',
                'groupe' => 'G6',
                'juree' => 'Mr.Amine Zeguendri', 
                'rapport_path' => null,
                'confirmed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'firstname' => 'Youssef',
                'lastname' => 'Airo',
                'groupe' => 'C3',
                'juree' => 'Mr.Amine Zeguendri', 
                'rapport_path' => null,
                'confirmed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
