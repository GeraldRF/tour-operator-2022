<?php

namespace Tests\Feature;

use App\Models\Bill;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\BillReport;
use App\Models\Reservation;
use App\Models\Supplier;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BillReportTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    // public function el_sistema_puede_crear_reporte_de_gastos_en_la_db()
    // {

    //     Supplier::factory()->create();

    //     Vehicle::factory()->create();
    //     Bill::factory()->create();

    //     Reservation::factory()->create();

    //     $billReport = BillReport::factory()->make();

    //     $this->post('reporte-gastos', $billReport->toArray());
  
    //     $this->assertDatabaseHas('bill_reports', $billReport->toArray());
    // }

    /** @test */
    // public function el_sistema_puede_listar_reporte_de_gastos()
    // {
    //    //
    // }
}
