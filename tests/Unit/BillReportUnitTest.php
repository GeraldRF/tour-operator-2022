<?php

namespace Tests\Feature;

use App\Models\Bill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\BillReport;
use App\Models\Reservation;
use App\Models\Supplier;
use App\Models\Vehicle;

class BillReportUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function el_sistema_puede_crear_reporte_de_gastos()
    {

        $supplier = Supplier::factory()->create();

        $vehicle = Vehicle::factory()->create();
        $bill = Bill::factory()->create(['vehicle_id'=>$vehicle->id]);

        $reserva = Reservation::factory()->create();



        $billReport = BillReport::factory()->create(['supplier_id'=>$supplier->id, 'bill_id'=>$bill->id, 'vehicle_id'=>$vehicle->id, 'reservation_id'=>$reserva->id]);

        $this->assertEquals($billReport->id, BillReport::find($billReport->id)->id);


    }

    /** @test */
    public function el_sistema_puede_listar_reporte_de_gastos()
    {
        $supplier = Supplier::factory()->create();

        $vehicle = Vehicle::factory()->create();
        $bill = Bill::factory()->create(['vehicle_id'=>$vehicle->id]);

        $reserva = Reservation::factory()->create();

        BillReport::factory(3)->create(['supplier_id'=>$supplier->id, 'bill_id'=>$bill->id, 'vehicle_id'=>$vehicle->id, 'reservation_id'=>$reserva->id]);

        $this->assertEquals(3, count(BillReport::all()));
    }
}
