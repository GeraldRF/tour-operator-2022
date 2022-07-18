<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->firstName(),
            'costo'=>$this->faker->numerify('#######'),
            'tipo_servicio' => $this->faker->text(),
            'supplier_id' => Supplier::all()->random()->id,
        ];
    }
}
