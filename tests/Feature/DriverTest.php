<?php

namespace Tests\Feature;
use App\Models\Driver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DriverTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    
    /** @test */
    public function el_sistema_puede_almacenar_conductores_en_la_db()
    {
      

        $drivers = Driver::factory()->make();
  
        $this->post('chofer', $drivers->toArray());
  
        $this->assertDatabaseHas('drivers', $drivers->toArray());

    }

    

}