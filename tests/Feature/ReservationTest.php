<?php

namespace Tests\Feature;

use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  /** @test */
  public function el_sistema_puede_crear_una_reservacion()
  {
      $Reservita = new Reservation(['Cliente' => 'Jafeth']);

      $this->assertEquals('Jafeth', $Reservita ->Cliente);
     
  }

/** @test */
 public function el_sistema_puede_editar_una_reservacion()
 {
    
    $Reservita = Reservation::factory(3)->create();
    $Reservita = Reservation::find(1);
    $ClienteAModificar=$Reservita->Cliente;
    $this->assertEquals($ClienteAModificar,$Reservita->Cliente);

    $Reservita->Cliente = 'Fabricio';
    $Reservita->save();

    $Reservita = Reservation::find(1);

     $this->assertEquals('Fabricio', $Reservita ->Cliente);


 }

/** @test */
public function el_sistema_puede_eliminar_una_reservacion()
{
   $Reservita = Reservation::factory(3)->create();
  
   $Reservita=Reservation::find(1);
   $Reservita->delete();
   $this->assertDatabaseMissing('reservations', ['id' => '1']);
  
}


/** @test */
public function el_sistema_puede_mostrar_la_reservacion()
{
   $Reservacion= Reservation::factory(2)->create();
   $ReservacionMostrar=Reservation::find($Reservacion[0]->id);
   
   
   $this->assertEquals($ReservacionMostrar->id,$Reservacion[0]->id);
  
}

}
