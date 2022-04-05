<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([
            "nom" => "Attaquant"
        ]);

        DB::table("roles")->insert([
            "nom" => "Central"
        ]);

        DB::table("roles")->insert([
            "nom" => "Défenseur"
        ]);

        DB::table("roles")->insert([
            "nom" => "Remplaçant"
        ]);
    }
}
