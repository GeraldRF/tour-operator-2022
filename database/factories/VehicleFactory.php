<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'placa' => $this->faker->unique()->randomNumber(4),
            'marca' => $this->faker->randomElement(['Toyota', 'Honda', 'Chevrolet', 'Ford']),
            'modelo' => $this->faker->randomElement(['Corolla', 'Accord', 'Camry', 'Mustang']),
            'capacidad' => $this->faker->numberBetween(1, 5),
        ];
    
    }

   

    



}
