<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Joueur>
 */
class JoueurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $equipe = 2;
        static $role = 1;
        static $counter = 0;
        

        if ($counter < 2) {
            $counter++;
        } else {
            $role++;
            if ($role === 4) {
                $counter = 0;
            } else {
                $counter = 1;
            }
        }

        if ($role > 4) {
            $role = 1;
            $equipe++;
            $counter = 1;
        }



        return [
            "nom" => $this->faker->lastName(),
            "prenom" => $this->faker->firstName(),
            "age" => $this->faker->numberBetween(18, 32),
            "tel" => $this->faker->phoneNumber(),
            "email" => $this->faker->email(),
            "genre" => $this->faker->randomElement(["H", "F", "X"]),
            "pays" => $this->faker->country(),
            "role_id" => $role,
            "equipe_id" => $equipe
        ];
    }
}
