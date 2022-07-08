<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cedulaJuridica' => $this->faker->unique()->randomNumber(8),
            'nombre' => $this->faker->name,
            'tipoEmpresa' => $this->faker->randomElement(['S.A.', 'S.C.', 'S.R.L.', 'S.E.N.C.']),
            'porcentajeComision' => $this->faker->numberBetween(1, 100),
        ];
       
    }
}
