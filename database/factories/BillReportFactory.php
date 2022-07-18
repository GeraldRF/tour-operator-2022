<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\Reservation;
use App\Models\Supplier;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\billReport>
 */
class BillReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'rango_fechas' => $this->faker->text(),
            'supplier_id'=>Supplier::all()->random()->id, 
            'bill_id'=>Bill::all()->random()->id, 
            'vehicle_id'=>Vehicle::all()->random()->id, 
            'reservation_id'=>Reservation::all()->random()->id,
        ];
    }
}
