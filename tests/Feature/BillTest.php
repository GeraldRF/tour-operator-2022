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
   //use RefreshDatabase;
   use WithoutMiddleware;

   /** @test */
   public function el_sistema_puede_almacenar_gastos()
   {


      $bill = Bill::factory()->make();

      $this->post('gastos', $bill->toArray());

      $this->assertDatabaseHas('bills', $bill->toArray());
     
   }

   /** @test */
   // public function el_sistema_puede_mostrar_gastos()
   // {

   //      $vehicle = Vehicle::factory()->create();
   //      Bill::factory(7)->create(['vehicle_id'=>$vehicle->id]);

   //      $this->assertEquals(7, count(Bill::All())); 

   // }
}
