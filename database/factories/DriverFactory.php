<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nombre' => $this->faker->name,
            'cedula' => $this->faker->unique()->randomNumber(8),
            'fechaNacimiento' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'tipoLicencia' => $this->faker->randomElement(['A', 'B', 'C']),
        ];
    }
}
