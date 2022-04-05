<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Equipe>
 */
class EquipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $nomEquipe = 0;
        $nomEquipe++;

        return [
            "nom" => "Equipe " . $nomEquipe,
            "pays" => $this->faker->country(),
            "continent" => $this->faker->randomElement(["EU", "HEU"]),
            "attaquant" => 2,
            "central" => 2,
            "defenseur" => 2,
            "remplacant" => 3,
        ];
    }
}
