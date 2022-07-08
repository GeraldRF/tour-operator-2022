<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\ServiceReport;
use App\Models\Reservation;
use App\Models\Supplier;
use App\Models\Vehicle;
use App\Models\Driver;

class ServiceReportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function el_sistema_puede_crear_reporte_de_servicios()
    {
        $supplier = Supplier::factory()->create();

        $vehicle = Vehicle::factory()->create();
       
        $reserva = Reservation::factory()->create();

        $driver = Driver::factory()->create();


        $serviceReport = ServiceReport::factory()->create(['supplier_id'=>$supplier->id,  'vehicle_id'=>$vehicle->id, 'reservation_id'=>$reserva->id, 'driver_id'=>$driver->id]);

        $this->assertEquals($serviceReport->id, ServiceReport::find($serviceReport->id)->id);
    }

    /** @test */
    public function el_sistema_puede_listar_reporte_de_servicios()
    {
        $supplier = Supplier::factory()->create();

        $vehicle = Vehicle::factory()->create();
       
        $reserva = Reservation::factory()->create();

        $driver = Driver::factory()->create();

        ServiceReport::factory(3)->create(['supplier_id'=>$supplier->id, 'vehicle_id'=>$vehicle->id, 'reservation_id'=>$reserva->id, 'driver_id'=>$driver->id]);

        $this->assertEquals(3, count(ServiceReport::all()));
    }
}
