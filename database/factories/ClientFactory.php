<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'nombre'=>$this->faker->name(),
            'apellidos'=>$this->faker->name(),
            'cedula'=>$this->faker->unique()->numberBetween($min =100000000, $max = 900000000),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-90 years', '-12 years'),
            'correo_electronico'=>$this->faker->unique()->email(),



        ];
    }
}
