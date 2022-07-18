<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Service;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'client_id'=>Client::all()->random()->id,
            'supplier_id'=>Supplier::all()->random()->id,
            'numero_vuelo'=>$this->faker->randomNumber(1,10),
            'cantidad_pasajeros'=>$this->faker->randomNumber(1,30),
            'fecha_hora'=>$this->faker->dateTime(),
            'tarifa_servicio'=>$this->faker->money_format(),
            'tipo_pago'=>$this->faker->text(),
            'observaciones'=>$this->faker->text(),


            
        ];
    }
}
