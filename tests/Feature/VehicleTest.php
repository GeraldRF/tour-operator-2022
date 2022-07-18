<?php

namespace Tests\Feature;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class VehicleTest extends TestCase
{
    use refreshDatabase;
    use WithoutMiddleware;
    
/** @test */
    public function el_sistema_puede_crear_un_vehiculo_en_la_db()
    {
        $vehicle = Vehicle::factory()->make();
  
        $this->post('vehiculo', $vehicle->toArray());
  
        $this->assertDatabaseHas('vehicles', $vehicle->toArray());
       
    }

    /** @test */
    public function el_sistema_puede_editar_un_vehiculo_de_la_db()
    {
        $vehicle = Vehicle::factory()->create();

        $response = $this->get('vehiculo/'.$vehicle->id.'/edit');

       $response->assertStatus(200)->assertSee($vehicle->placa);

        $vehicle->placa = '12321';
        $vehicle->marca = 'Mercedes';
     
        $this->put('vehiculo/'.$vehicle->id, $vehicle->toArray());

        $response->assertSessionHas('success_msg', 'Actualizado correctamente');

        $response = $this->get('vehiculo');

        $response->assertStatus(200)->assertSee($vehicle->placa);
    }

    /** @test */
    public function el_sistema_puede_eliminar_un_vehiculo_de_la_db()
    {
        $vehicles = Vehicle::factory(3)->create();
   
        $response = $this->delete('vehiculo/'.$vehicles[1]->id);
     
        $response->assertSessionHas('success_msg', 'Se elimino correctamente');
     
        $this->assertDatabaseMissing('vehicles', ['id' => $vehicles[1]->id]);
    }

    /** @test */
    public function el_sistema_puede_mostrar_todos_los_vehiculos_de_la_db()
    {
        Vehicle::factory(7)->create();
 
        $response = $this->get('vehiculo');

        $response->assertStatus(200)->assertSee(Vehicle::all()->random()); 
    }
   
}
