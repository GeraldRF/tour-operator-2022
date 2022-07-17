<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fecha' => $this->faker->dateTime(),
            'tipo_gasto' => $this->faker->text(),
            'descripcion' => $this->faker->text(),
            'monto' => $this->faker->numerify('#######'),
            'vehicle_id'=>Vehicle::all()->random()->id,
        ];
    }
}
