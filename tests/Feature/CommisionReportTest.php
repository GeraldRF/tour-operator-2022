<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reservation;
use App\Models\Supplier;
use App\Models\CommisionReport;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CommisionReportTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function el_sistema_puede_crear_reporte_de_comisiones()
    {
        $supplier = Supplier::factory()->create();

        $reserva = Reservation::factory()->create();

        $commisionReport = CommisionReport::factory()->create(['supplier_id'=>$supplier->id, 'reservation_id'=>$reserva->id]);

        $this->assertEquals($commisionReport->id, CommisionReport::find($commisionReport->id)->id);
    }

    /** @test */
    public function el_sistema_puede_listar_reporte_de_comisiones()
    {
        $supplier = Supplier::factory()->create();

        $reserva = Reservation::factory()->create();

        CommisionReport::factory(3)->create(['supplier_id'=>$supplier->id, 'reservation_id'=>$reserva->id]);

        $this->assertEquals(3, count(CommisionReport::all()));
    }
}
