<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Bill;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class BillTest extends TestCase
{
   use RefreshDatabase;
   use WithoutMiddleware;

   /** @test */
   public function el_sistema_puede_almacenar_gastos_en_la_db()
   {

      Vehicle::factory()->create();

      $bill = Bill::factory()->make();

      $this->post('gastos', $bill->toArray());

      $this->assertDatabaseHas('bills', $bill->toArray());
     
   }

   /** @test */
   public function el_sistema_puede_mostrar_todos_los_gastos_de_la_db()
   {

        Vehicle::factory(4)->create();

        Bill::factory(7)->create();

        $response = $this->get('gastos');

        $response->assertStatus(200)->assertSee(Bill::all()->random()); 

   }
}
