<?php

namespace Database\Seeders;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class
        ]);

        DB::table("equipes")->insert([
            "nom" => "Sans équipe",
            "pays" => " ",
            "continent" => " ",
            "attaquant" => 999,
            "central" => 999,
            "defenseur" => 999,
            "remplacant" => 999,
        ]);
        Equipe::factory(10)->create();
        Joueur::factory(50)->create();
        Photo::factory(50)->create();

    }
}
