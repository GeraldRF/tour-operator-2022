<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Bill;
use App\Models\Vehicle;

class BillUnitTest extends TestCase
{
    use RefreshDatabase;

     /** @test */
     public function el_sistema_puede_almacenar_gastos()
     {
 
         
        $vehicle = Vehicle::factory()->create();
        $bill = Bill::factory()->create(['vehicle_id'=>$vehicle->id]);
 
        $this->assertEquals($bill->id, Bill::find($bill->id)->id); 

     }

     /** @test */
     public function el_sistema_puede_mostrar_gastos()
     {
 
        $vehicle = Vehicle::factory()->create();
        Bill::factory(7)->create(['vehicle_id'=>$vehicle->id]);
 
        $this->assertEquals(7, count(Bill::All())); 

     }
}
