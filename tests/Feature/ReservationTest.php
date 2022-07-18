<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Supplier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  /** @test */
  public function el_sistema_puede_crear_una_reservacion_en_la_bd()
  {

   Client::factory()->create();
   Supplier::factory()->create();

   $Reservacion = Reservation::factory()->make();

   $this->post('reservacion', $Reservacion->toArray());

   $this->assertDatabaseHas('reservations', $Reservacion->toArray());
     
  }

/** @test */
 public function el_sistema_puede_editar_una_reservacion_de_la_bd()
 {
    
   Client::factory()->create();
   Supplier::factory()->create();
   $reservacion = Reservation::factory()->create();
    
    $response = $this->get('servicio/'.$reservacion->id.'/edit');

   $response->assertStatus(200)->assertSee($reservacion->nombre);

    //editar servicio
    $reservacion->numero_vuelo = '150';
    $reservacion->cantidad_pasajeros = '25';
    
 
    $this->put('reservacion/'.$reservacion->id, $reservacion->toArray());

    $response->assertSessionHas('success_msg', 'Actualizado correctamente');

    $response = $this->get('servicio');

    $response->assertStatus(200)->assertSee([$reservacion->nombre,$reservacion->apellidos]);


 }

/** @test */
public function el_sistema_puede_eliminar_una_reservacion_de_la_bd()
{
   Client::factory()->create();
   Supplier::factory()->create();

   $reservacion =Reservation::factory(3)->create();
   
   $response = $this->delete('reservacion/'.$reservacion[1]->id);

   $response->assertSessionHas('success_msg', 'Se elimino correctamente');

   $this->assertDatabaseMissing('reservations', ['id' => $reservacion[1]->id]);
  
}


/** @test */
public function el_sistema_puede_mostrar_la_reservacion_de_la_bd()
{
   Client::factory()->create();
   Supplier::factory()->create();

   Reservation::factory(3)->create();

   $response = $this->get('reservacion');

   $response->assertStatus(200)->assertSee(Reservation::all()->random()); 
  
}

}
