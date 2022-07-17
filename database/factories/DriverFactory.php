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
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-60 years', '-18 years'),
            'tipo_licencia' => $this->faker->randomElement(['A', 'B', 'C']),
        ];
    }
}
