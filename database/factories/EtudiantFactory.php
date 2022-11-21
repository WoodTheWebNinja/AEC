<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etudiant;
use App\Models\Villes ;


class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
     

    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'phone' => $this->faker->phonenumber(),
            'email' => $this->faker->email(),
            'date_de_naissance' => $this->faker->dateTimeBetween('1990-01-01', '2000-12-31')->format('m/d/Y'),
            //'villeID' => $this->faker->unique()->numberBetween(1, App\Villes::class)->id,
            'villeID' => $this->faker->unique()->numberBetween(1, 15),
            'user_id' => $this->faker->unique()->numberBetween(1, 15),
        ];
    }

}
